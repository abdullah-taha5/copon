<?php

namespace App\Http\Middleware;

use App\Models\Coupon;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCop
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $course = $request->route()->parameter('course');
        $coupon     = Coupon::withCount('total_counter', 'daily_counter')->where('user_id', '=', auth()->user()->id)
        ->where('course_id', '=', $course->id)
        ->where('started_at', '<=', Carbon::now())
        ->where('expire_at', '>=', Carbon::now()) // Records where expire_date is in the future or now
        ->first();
        $request->merge(['coupon' => $coupon]);
        $flag       = true;
        if($coupon != null) {
            if($coupon->daily_views_limit <= $coupon->total_counter_count) {
                $flag       = false;
                abort(403, 'You have exceeded your total limit');

            }
            if($coupon->total_views_limit <= $coupon->daily_counter_count) {

                abort(403, 'You have exceeded your daily limit');
                
            }
            if($coupon->started_at != null && $coupon->expire_at != null) {
                $DateResponse = $this->checkDates($coupon->started_at, $coupon->expire_at);
                if(!$DateResponse['status']) {
                    $flag       = false;
                }
            } else {
                if($coupon->started_at != null) {
                    if(!$this->checkStartDate($coupon->started_at)) {
                        $flag       = false;
                    }
                }
                if($coupon->expire_at != null) {
                    if(!$this->checkExpiryDate($coupon->expire_at)) {
                        $flag       = false;    
                    }
                }
            }
            if($flag) {
                return $next($request);
            } else {
                abort(401);
            }
        } else {
            abort(401);
        }
    }


    function checkDates($startDate, $expiryDate) {
        // Retrieve the current date
        $currentDate = Carbon::now();
    
        // Convert the start date and expiry date to Carbon instances
        $startDate = Carbon::parse($startDate);
        $expiryDate = Carbon::parse($expiryDate);
    
        // Check if the start date is before or equal to the current date
        if ($startDate->lte($currentDate) && $expiryDate->gt($currentDate)) {
            return [
                'status'    => true,
                'message'   => "The start date has already occurred and the expiry date has not yet occurred."
            ];
        } elseif ($startDate->gt($currentDate)) {
            return [
                'status'    => false,
                'message'   => "The start date has not yet occurred."
            ];
        } elseif ($expiryDate->lte($currentDate)) {
            return [
                'status'    => false,
                "The expiry date has already occurred."
            ];
        } else {
            return [
                'status'    => false,
                "Invalid date range."
            ];
        }
    }
    function checkStartDate($startDate) {
        // Retrieve the current date
        $currentDate = Carbon::now();
    
        // Convert the start date to a Carbon instance
        $startDate = Carbon::parse($startDate);
    
        // Check if the start date is before or equal to the current date
        if ($startDate->lte($currentDate)) {
            return true;
        } else {
            return false;
        }
    }
    function checkExpiryDate($expiryDate) {
        // Retrieve the current date
        $currentDate = Carbon::now();
    
        // Convert the expiry date to a Carbon instance
        $expiryDate = Carbon::parse($expiryDate);
    
        // Check if the expiry date is greater than the current date
        if ($expiryDate->gt($currentDate)) {
            return true;
        } else {
            return false;
        }
    }

}
