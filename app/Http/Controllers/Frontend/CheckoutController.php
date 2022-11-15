<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Cart;
use App\Models\Frontend\District;
use App\Models\Frontend\Division;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderBillingDetails;
use App\Models\Frontend\OrderProductDetails;
use App\Models\Frontend\SubDistrict;
use App\Models\ProductVariation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $divisions = Division::all();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('frontend.checkout.index',[
            'divisions'=>$divisions,
            'carts'=>$carts,
        ]);
    }

    public function district(Request $request){
        $districts = District::where('division_id', $request->division_id)->get();
        $store = '<option value="">-Select-</option>';
        foreach ($districts as $district) {
            $store .='<option value="'.$district->id.'">'.$district->name.'</option>';
        }
        echo $store;
    }

    //sub_district
    public function sub_district(Request $request){
        $sub_districts = SubDistrict::where('district_id', $request->district_id)->get();
        $store = '<option value="">-Select-</option>';
        foreach ($sub_districts as $sub_district) {
            $store .='<option value="'.$sub_district->id.'">'.$sub_district->name.'</option>';
        }
        echo $store;
    }
    public  function order(Request $request){
      // return $request->all();
        $request->validate([
            // 'fname'=>'required',
            // 'lname'=>'required',
            // 'email'=>'required',
            // 'number'=>'required',
            // 'country'=>'required',
            // 'division'=>'required',
            // 'district'=>'required',
            // 'sub_district'=>'required',
            // 'state'=>'required',
            // 'zip_code'=>'required',
            // 'address'=>'required',
            'payment_method'=>'required',
        ],[
            'payment_method.required'=>'Please Select Payment Method',
        ]);
        $user_id = Auth::user()->id;
         //order table
        //  $order_id = Order::insertGetId([
        //     'user_id'=>$user_id,
        //     'sub_total'=>$request->subtotal,
        //     'discount'=>$request->product_discount,
        //     'total'=>$request->total + $request->delevery_charge,
        //     'delivery_charge'=>$request->delevery_charge,
        //     'payment_method'=>$request->payment_method,
        //     'created_at'=>Carbon::now(),

        // ]);

        // // billings table
        // OrderBillingDetails::insert([
        //     'order_id'=>$order_id,
        //     'fname'=>$request->fname,
        //     'lname'=>$request->lname,
        //     'email'=>$request->email,
        //     'phone_number'=>$request->number,
        //     'country'=>$request->country,
        //     'division'=>$request->division,
        //     'district'=>$request->district,
        //     'sub_district'=>$request->sub_district,
        //     'state'=>$request->state,
        //     'zip_code'=>$request->zip_code,
        //     'address'=>$request->address,
        //     'order_note'=>$request->order_note,
        //     'created_at'=>Carbon::now(),
        // ]);

        // //order product details table
         $cart_items = Cart::where('user_id', $user_id)->get();
        // foreach ($cart_items as $cart) {
        //     OrderProductDetails::insert([
        //         'order_id'=>$order_id,
        //         'product_id'=>$cart->product_id,
        //         'product_name'=>$cart->product->productName,
        //         'product_price'=>$cart->product->after_discount,
        //         'quantity'=>$cart->quntity,
        //         'color'=>$cart->color_id ?? null,
        //         'size'=>$cart->size_id ?? null,
        //         'created_at'=>Carbon::now(),
        //     ]);
        // }

        if($request->payment_method == 1){

            //delete cart items---
                // decrement product quantity
                foreach($cart_items as $carts){
                    ProductVariation::where('product_id', $carts->product_id)
                    ->where('color_id', $carts->color_id)
                    ->where('size_id', $carts->size_id)
                    ->decrement('quantity', $carts->quntity);
                }
                //delete all cart item
                $cart_delete = Cart::where('user_id', $user_id);
                $cart_delete->delete();

            return redirect()->route('order.confirm');
        }

        elseif($request->payment_method == 2){
           $subtotal = $request->subtotal;
           $discount = $request->product_discount;
           $delivery_charge= $request->delevery_charge;
            return view('exampleHosted',[
                'subtotal'=>$subtotal,
                'discount'=>$discount,
                'delivery_charge'=>$delivery_charge,
            ]);
        }

    }

    //order_confirm
    public function order_confirm(){
        return view('frontend.order_confirm');
    }
}
