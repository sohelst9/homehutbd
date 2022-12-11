<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function dashboard(){
        return view('frontend.accounts.dashboard');
    }

    //customer_order_list
    public function customer_order_list()
    {
        $orders = Order::where('id', auth()->user()->id)
        ->with('OrderProductDetails')
        ->get();
        return view('frontend.accounts.customer_order_list', compact('orders'));
    }
}
