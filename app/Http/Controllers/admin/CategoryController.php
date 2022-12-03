<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\Cast;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $a= $request->input('category_search');
        if($a != ''){
            $all_category = Category::where('name', 'like', '%'.$a.'%')->latest()->paginate(2);
        }
        else{
            $all_category = Category::latest()->paginate(5);
        }
        // $all_category = Category::paginate(10);
        return view('admin.category.index',[
            'all_category'=>$all_category,
        ]);
    }

    public function create()
    {
        return view('admin.category.add_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'banner'=>'required|mimes:png,jpg,jpeg',
            'meta_title'=>'required',
            'meta_descp'=>'required',
        ]);
        if($request->hasFile('banner')){
            $file = $request->file('banner');
            $file_name = 'category'.uniqid().'.'.$file->getClientOriginalExtension();
            $file_path = public_path('/images/category');
            $file_location = $request->file('banner')->move($file_path,$file_name);
        }
        $admin_id =Auth::guard('admin')->user()->id;

        Category::insert([
            'admin_id'=>$admin_id,
            'name'=>$request->name,
            'banner'=>$file_name,
            'meta_title'=>$request->meta_title,
            'meta_descp'=>$request->meta_descp,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Category Created Success');
    }

    public function edit($id)
    {
        $category_id = Category::find($id);
        return view('admin.category.edit',[
            'category_id'=>$category_id,
        ]);
    }

    public function update(Request $request, $id)
    {
       if($request->banner == ''){
        $request->validate([
            'name'=>'required',
            'meta_title'=>'required',
            'meta_descp'=>'required',
       ]);
       Category::find($id)->update([
        'name'=>$request->name,
        'meta_title'=>$request->meta_title,
        'meta_descp'=>$request->meta_descp,
       ]);
       return redirect()->route('category.index')->with('success', 'Category Updated');
       }
       else{
        if($request->hasFile('banner')){
            $request->validate([
                'name'=>'required',
                'banner'=>'required|mimes:png,jpg,jpeg',
                'meta_title'=>'required',
                'meta_descp'=>'required',
            ]);
            $banner = Category::find($id)->banner;
            $banner_path ='images/category/'.$banner;
            File::delete(public_path($banner_path));
            // create banner new location
            $bannerName = $request->file('banner');
            $newFileName = uniqid().'categories'.'.'.$bannerName->extension();
            $path = public_path('/images/category');
            $location = $request->file('banner')->move($path,$newFileName);

            Category::find($id)->update([
                'name'=>$request->name,
                'banner'=>$newFileName,
                'meta_title'=>$request->meta_title,
                'meta_descp'=>$request->meta_descp,
            ]);
            return redirect()->route('category.index')->with('success', 'Category Updated');
          }

       }
    }

    public function destroy($id)
    {
        $banner_name = Category::find($id)->banner;
        $bannerPath ='images/category/'.$banner_name;
        File::delete(public_path($bannerPath));

        Category::find($id)->delete();
        return redirect()->route('category.index')->with('success', 'Category Deleted');
    }
}
