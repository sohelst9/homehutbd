<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Frontend\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index($coupon_code = ''){
        if($coupon_code == ''){
           $discount = 0;
        }
        else{
           $c_code =Coupon::where('name',$coupon_code)->first();
           if($c_code){
                if(Carbon::now()->format('Y-m-d') > $c_code->validity){
                    return back()->with('msg', 'Coupon Code Expired');
                }
                else{

                    $discount = $c_code->discount;

                }
           }
           else{
            return back()->with('msg', 'Invalid Coupon Code');
           }
        }

        $user_carts = Cart::with('product')->where('user_id',Auth::user()->id)->get();
        return view('frontend.cart.index',[
            'user_carts'=>$user_carts,
            'discount'=>$discount,
            'coupon_code'=>$coupon_code,
        ]);
    }

    public function insert(Request $request){
      // return $request->all();
        $user_id = Auth::user()->id;
        $same_info =Cart::where('user_id', $user_id)->where('product_id', $request->product_id)->where('color_id', $request->color)->where('size_id', $request->size);
        if($same_info->exists()){
           Cart::where('product_id', $request->product_id)->increment('quntity', $request->quntity);
           return back()->with('success', 'Cart Added');
        }
        else{
           Cart::insert([
                'user_id'=>$user_id,
                'product_id'=>$request->product_id,
                'product_id'=>$request->product_id,
                'color_id'=>$request->color,
                'size_id'=>$request->size,
                'quntity'=>$request->quntity,
                'created_at'=>Carbon::now(),
           ]);
           return back()->with('success', 'Cart Added');
        }
    }

    //update
    public function update(Request $request){
        foreach ($request->quantity as $cart_id=>$quatity) {
            Cart::find($cart_id)->update([
                'quntity'=>$quatity,
            ]);
        }
        return back()->with('success', 'Cart Updated Success');
    }

    //destroy
    public function destroy($id){
        Cart::find($id)->delete();
        return back()->with('success', 'Cart Delete Success');
    }
}
