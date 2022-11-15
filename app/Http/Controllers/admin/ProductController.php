<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductVariation;
use App\Models\Size;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.product.index',[
            'products'=>$products,
        ]);
    }

    public function create(){
        $categories =Category::all();
        $Brands =Brand::all();
        $colors =Color::all();
        $sizes =Size::all();
        return view('admin.product.add_product',[
            'categories'=>$categories,
            'Brands'=>$Brands,
            'colors'=>$colors,
            'sizes'=>$sizes,
        ]);
    }

    public function getCategorys(Request $request){
       $subcategories =  Subcategory::where('category',$request->category_id)->get();
       $store =' <option value="">--Subcategories--</option>';
       foreach($subcategories as $subcategory){
            $store .= '<option value="'.$subcategory->id.'">'.$subcategory->subcategory.'</option>';
       }
       echo $store;
    }

    public function store(Request $request){
        $request->validate([
            'ProductName'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
            'barcode'=>'required',
            'ThumbnailImage'=>'required',
            'ProductPrice'=>'required',
            'description'=>'required',
            'metaTitle'=>'required',
        ]);
        if($request->hasfile('ThumbnailImage')){
            $file = $request->file('ThumbnailImage');
            $thumbnailImageName ='thumbnailImageName'.uniqid().'.'.$file->extension();
            $filePath ='public/backend/upload/product/thumbnailImage';
            $request->file('ThumbnailImage')->storeAs($filePath,$thumbnailImageName);
        }
        $user_id = Auth::guard('admin')->user()->id;
       $product_id = Product::insertGetId([
            'added_by'=>$user_id,
            'productName'=>$request->ProductName,
            'category_id'=>$request->category,
            'subcategory_id'=>$request->subcategory,
            'brand_id'=>$request->brand,
            'weight'=>$request->weight,
            'barcode'=>$request->barcode,
            'thumbnailImage'=>$thumbnailImageName,
            'productPrice'=>$request->ProductPrice,
            'discount'=>$request->discount,
            'after_discount'=>$request->ProductPrice-$request->ProductPrice*$request->discount/100,
            'discountDate'=>$request->discountDate,
            'description'=>$request->description,
            'meta_title'=>$request->metaTitle,
            'meta_descp'=>$request->metaDescription,
            'featured'=>$request->featured,
            'to_day_deal'=>$request->todayDeal,
            'addToFlash'=>$request->addToFlash,
            'vat'=>$request->vat,
            'tax'=>$request->tax,
            'created_at'=>Carbon::now(),
       ]);

       // product gallery
       $gallery_id = 1;
       if($request->hasFile('galleryImage')){
          $galleryImage = $request->file('galleryImage');
          foreach($galleryImage as $gallery){
             $galleryImageName = $product_id.'-'.$gallery_id.'.'.$gallery->getClientOriginalExtension();
             $gallery_path = 'public/backend/upload/product/galleryImage';
             $gallery->storeAs($gallery_path,$galleryImageName);

             ProductGallery::insert([
                'product_id'=>$product_id,
                'gallery'=>$galleryImageName,
                'created_at'=>Carbon::now(),
             ]);

             $gallery_id++;
          }
       }
       return back()->with('success', 'Product Created Success');
    }
    // product edit
    public function edit($id){
        $categories = Category::all();
        $products = Product::find($id);
        $subcategories =Subcategory::where('category', $products->category_id)->get();
        $Brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.product.edit', compact('products', 'categories', 'Brands', 'colors', 'sizes', 'subcategories'));
    }

    //galleryImage_delete
    public function galleryImage_delete($galleryImage){
        $product_gallery_id = ProductGallery::findOrFail($galleryImage);
        $galleryImage_name = $product_gallery_id->gallery;
        $oldPath ='storage/backend/upload/product/galleryImage/'.$galleryImage_name;
        File::delete(public_path($oldPath));
        $product_gallery_id->delete();
        return response()->json(['message'=>'product Gallery Image deleted']);
    }
    //products update
    public function update(Request $request){
        // dd($request->all());
      if($request->hasFile('ThumbnailImage')){
        $request->validate([
            'ProductName'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
            'barcode'=>'required',
            'ProductPrice'=>'required',
            'description'=>'required',
            'metaTitle'=>'required',
        ]);
        $product_id1 = $request->id;
        // old thumbnailImage Remove
            $oldFile = Product::findOrFail($request->id)->thumbnailImage;
            $oldPath ='storage/backend/upload/product/thumbnailImage/'.$oldFile;
            File::delete(public_path($oldPath));
        // new thumbnailImage upload
        $file = $request->file('ThumbnailImage');
        $thumbnailImageName ='NewthumbnailImageName'.uniqid().'.'.$file->extension();
        $filePath ='public/backend/upload/product/thumbnailImage';
        $request->file('ThumbnailImage')->storeAs($filePath,$thumbnailImageName);

        //update product table info
        Product::find($request->id)->update([
             'productName'=>$request->ProductName,
             'category_id'=>$request->category,
             'subcategory_id'=>$request->subcategory,
             'brand_id'=>$request->brand,
             'weight'=>$request->weight,
             'barcode'=>$request->barcode,
             'thumbnailImage'=>$thumbnailImageName,
             'productPrice'=>$request->ProductPrice,
             'discount'=>$request->discount,
             'after_discount'=>$request->ProductPrice-$request->ProductPrice*$request->discount/100,
             'discountDate'=>$request->discountDate,
             'description'=>$request->description,
             'meta_title'=>$request->metaTitle,
             'meta_descp'=>$request->metaDescription,
             'featured'=>$request->featured,
             'to_day_deal'=>$request->todayDeal,
             'addToFlash'=>$request->addTosFlash,
             'vat'=>$request->vat,
             'tax'=>$request->tax,
        ]);
        //update gallery image
            if($request->hasFile('galleryImage')){
               $galleryImage = $request->file('galleryImage');
               foreach($galleryImage as $gallery){
                $galleryImageName = $product_id1.'-'.uniqid().'new'.'.'.$gallery->getClientOriginalExtension();
                  $gallery_path = 'public/backend/upload/product/galleryImage';
                  $gallery->storeAs($gallery_path,$galleryImageName);

                  ProductGallery::insert([
                    'product_id'=>$product_id1,
                     'gallery'=>$galleryImageName,
                     'created_at'=>Carbon::now(),

                  ]);
               }
            }

        return redirect()->route('product.index')->with('success', 'Product Updated Successfull');
      }
      else{
        $request->validate([
            'ProductName'=>'required',
            'category'=>'required',
            'subcategory'=>'required',
            'barcode'=>'required',
            'ProductPrice'=>'required',
            'description'=>'required',
            'metaTitle'=>'required',
        ]);
        $product_id1 = $request->id;
         Product::find($request->id)->update([
            'productName'=>$request->ProductName,
            'category_id'=>$request->category,
            'subcategory_id'=>$request->subcategory,
            'brand_id'=>$request->brand,
            'weight'=>$request->weight,
            'barcode'=>$request->barcode,
            'productPrice'=>$request->ProductPrice,
            'discount'=>$request->discount,
            'after_discount'=>$request->ProductPrice-$request->ProductPrice*$request->discount/100,
            'discountDate'=>$request->discountDate,
            'description'=>$request->description,
            'meta_title'=>$request->metaTitle,
            'meta_descp'=>$request->metaDescription,
            'featured'=>$request->featured,
            'to_day_deal'=>$request->todayDeal,
            'addToFlash'=>$request->addTosFlash,
            'vat'=>$request->vat,
            'tax'=>$request->tax,
        ]);
        //update gallery Image
        if($request->hasFile('galleryImage')){
           $galleryImage = $request->file('galleryImage');
           foreach($galleryImage as $gallery){
              $galleryImageName = $product_id1.'-'.uniqid().'new'.'.'.$gallery->getClientOriginalExtension();
              $gallery_path = 'public/backend/upload/product/galleryImage';
              $gallery->storeAs($gallery_path,$galleryImageName);

              ProductGallery::insert([
                'product_id'=>$product_id1,
                 'gallery'=>$galleryImageName,

              ]);
           }
        }

        return redirect()->route('product.index')->with('success', 'Product Updated Successfull');
        }


    }
    // product destroy
    public function destroy($id){
        //delete gallery Image
        $galleryImages = ProductGallery::where('product_id', $id)->get();
        foreach ($galleryImages as $gallery) {
            $galleryImagePaths = 'storage/backend/upload/product/galleryImage/'.$gallery->gallery;
            File::delete(public_path($galleryImagePaths));
            $gallery->delete();
        }

        // delete product thumbnail image
        $thumbnailImage = Product::find($id)->thumbnailImage;
        $path = 'storage/backend/upload/product/thumbnailImage/'.$thumbnailImage;
        File::delete(public_path($path));

        $product = Product::find($id);
        $product->delete();
         return redirect()->route('product.index')->with('success', 'Product Deleted Success !');
    }
}
