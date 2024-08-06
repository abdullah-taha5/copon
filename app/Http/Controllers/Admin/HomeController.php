<?php

namespace App\Http\Controllers\Admin;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        if (Auth::check() && Auth::user()->is_student) {
            return redirect()->route('student.home');
        }
        $coupons = Coupon::with('course')->withCount('total_counter', 'daily_counter')->where('user_id', '=', auth()->user()->id)->get();
        return view('admin.home', compact('coupons'));
    }
    public function home()
    {
        return view('home');
    }
}
