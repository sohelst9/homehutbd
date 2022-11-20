<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //product_shop
    public function product_shop(){
        $products = Product::latest()->paginate(5);
        return view('frontend.shop.index', compact('products'));
    }
}
