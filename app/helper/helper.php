<?php

use App\Models\Category;
use App\Models\Frontend\Cart;
use Illuminate\Support\Facades\Auth;
    // cart count
    function cartCount(){
        $carts_count = Cart::where('user_id', Auth::id())->count();
        return $carts_count;
    }

    function carts(){
        $carts = Cart::where('user_id', Auth::id())->get();
        return $carts;
    }

    function categories(){
        $categories = Category::with('Subcategory')->get();
        return $categories;
    }

 ?>
