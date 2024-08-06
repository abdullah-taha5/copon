<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() 
    {
        $coupons = Coupon::with('course')->withCount('total_counter', 'daily_counter')->where('user_id', '=', auth()->user()->id)->get();
        $coupons_count = Coupon::where('user_id', '=', auth()->user()->id)->count();
        return view('student.index', compact('coupons', 'coupons_count'));
    }
}
