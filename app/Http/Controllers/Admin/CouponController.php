<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use App\Models\Course;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('coupon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.coupon.index');
    }

    public function create()
    {
        abort_if(Gate::denies('coupon_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $courses = [];
        foreach (Course::get() as $course) {
            $courses[$course->id] = $course->translate(app()->getLocale())->title;
        }
        return view('admin.coupon.create', compact('courses'));
    }

    public function edit(Coupon $coupon)
    {
        abort_if(Gate::denies('coupon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $courses = [];
        foreach (Course::get() as $course) {
            $courses[$course->id] = $course->translate(app()->getLocale())->title;
        }
        return view('admin.coupon.edit', compact('coupon', 'courses'));
    }

    public function show(Coupon $coupon)
    {
        abort_if(Gate::denies('coupon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.coupon.show', compact('coupon'));
    }
    public function store(StoreCouponRequest $request)
    {
        abort_if(Gate::denies('coupon_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = $request->validated();
        if($request->coupon == null) {
            $data = ['coupon' => Str::random(5)] + $data; 
         }
         Coupon::create($data);
        
        return redirect()->route('admin.coupons.index');
    }
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        abort_if(Gate::denies('coupon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $data = $request->validated();
      
        $coupon->update($data);
        
        return redirect()->route('admin.coupons.index');
    }
    public function use(Request $request)
    {
        $coupon     = Coupon::where('coupon', '=', $request->coupon)->first();
        $flag       = true;
        $message    = "";

        if ($coupon != null) {    
            if($coupon->used != 0) {
                $flag       = false;
                $message    = __('app.used_coupon');
            }

            
            if($coupon->started_at != null && $coupon->expire_at != null) {
                $DateResponse = $this->checkDates($coupon->started_at, $coupon->expire_at);
                if(!$DateResponse['status']) {
                    $flag       = false;
                    $message    = $DateResponse['message'];
                }
            } else {
                if($coupon->started_at != null) {
                    if(!$this->checkStartDate($coupon->started_at)) {
                        $flag       = false;
                        $message    = __('app.not_started_coupon');
      
                    }
                }
                if($coupon->expire_at != null) {
                    if(!$this->checkExpiryDate($coupon->expire_at)) {
                        $flag       = false;
                        $message    = __('app.expired_coupon');
    
                    }
                }
            }
            if($flag) {
                $coupon->update([
                    'used'          => 1,
                    'user_id'       => auth()->user()->id
                ]);
                return  redirect()->back()->with('success', __('app.applied_coupon'));
            } else {
                return  redirect()->back()->with('error', $message);
            }
        } else {
            return  redirect()->back()->with('error', __('app.not_found_coupon'));
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
