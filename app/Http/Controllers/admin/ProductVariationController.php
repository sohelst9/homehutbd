<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    public function add_inventory($product_id){
        $variations =ProductVariation::where('product_id', $product_id)->get();
        $products = Product::find($product_id);
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.product.inventory.add_inventory',[
            'colors'=>$colors,
            'sizes'=>$sizes,
            'products'=>$products,
            'variations'=>$variations,
        ]);
    }

    public function variation_store(Request $request){
        if(ProductVariation::where([
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
        ])->exists()
        ){
            ProductVariation::where([
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
            ])->increment('quantity', $request->quantity);
            return back()->with('success', 'Product Quantity Increment Success');
        }
        else{
            ProductVariation::insert([
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('success', 'Product Inventory Insert Success');
        }
    }
}
