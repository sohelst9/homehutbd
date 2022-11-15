<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Frontend\Cart;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $toDayDeal_products = Product::where('to_day_deal', 'on')->get();
        return view('frontend.index', [
            'products' => $products,
            'toDayDeal_products' => $toDayDeal_products,
        ]);
    }
    //subcategory_shop
    public function subcategory_shop($subcat_id)
    {
        $subcate_id = Subcategory::findOrFail($subcat_id);
        $subcategory_product = Product::with('subcategory')->where('subcategory_id', $subcat_id)->get();
        return view('frontend.shop.subcategory_shop', compact('subcategory_product', 'subcate_id'));
    }

    //category_shop
    public function category_shop($cat_id)
    {
        $cate_id = Category::findOrFail($cat_id);
        $category_product = Product::with('category')->where('category_id', $cat_id)->get();
        return view('frontend.shop.category_shop', [
            'cate_id' => $cate_id,
            'category_product' => $category_product,
        ]);
    }
    //single_Product
    public function single_Product($product_id)
    {
        $subcate_id = Product::with('subcategory')->findOrFail($product_id);
        $single_products = Product::findOrFail($product_id);
        $colors = ProductVariation::with('colors')->where('product_id', $single_products->id)->groupBy('color_id')->selectRaw('count(*) as total, color_id')->get();
        return view('frontend.single_product',[
            'subcate_id'=>$subcate_id,
            'single_products'=>$single_products,
            'colors'=>$colors,
        ]);
    }

    //get_size
    public function get_size(Request $request){
        $sizes = ProductVariation::with('sizes')->where('color_id', $request->color_id)->where('product_id', $request->product_id)->get();
        $store = '<option value="">-Select-</option>';
        foreach ($sizes as $size) {
           $store .='<option value="'.$size->size_id.'">'.$size->sizes->name.'</option>';
        }
        echo $store;
    }

    //get_quantity
    public function get_quantity(Request $request){
        $quantity = ProductVariation::where([
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
        ])->first(['quantity']);
        echo $quantity->quantity;
    }
}
