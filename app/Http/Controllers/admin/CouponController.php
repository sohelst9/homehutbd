<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::get();
        return view('admin.Coupon.index',[
            'coupons'=>$coupons,
        ]);
    }

    public function create()
    {
        return view('admin.Coupon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'discount'=>'required',
            'validity'=>'required',
        ]);

        Coupon::insert([
            'name'=>$request->name,
            'discount'=>$request->discount,
            'validity'=>$request->validity,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'Coupon Added');
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
