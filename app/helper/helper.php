<?php

use App\Models\Category;
use App\Models\ContactInfoWidget;
use App\Models\Copyright;
use App\Models\Frontend\Cart;
use App\Models\HeaderSetting;
use App\Models\StayInformed;
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

    //header setting info
    function headerSetting(){
        $headersetting = HeaderSetting::latest()->first();
        return $headersetting;
    }

    //footer contace info
    function contactInfo(){
        $contaceInfo = ContactInfoWidget::latest()->first();
        return $contaceInfo;
    }

     //footer stay informed
     function stayInformed(){
        $stayInformed = StayInformed::latest()->first();
        return $stayInformed;
    }

    //footer copyright
    function copyright(){
        $copyright = Copyright::latest()->first();
        return $copyright;
    }

 ?>
