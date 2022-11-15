<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class subCategoryController extends Controller
{
    public function index(Request $request)
    {
        $inputSearch = $request->search;
        if($inputSearch != ''){
            $subcategories = Subcategory::where('subcategory', 'Like', '%'.$inputSearch.'%')->paginate(5);
            return view('admin.subCategory.index',[
                'subcategories'=>$subcategories,
            ]);
        }
        else{
            $subcategories = Subcategory::paginate(5);
            return view('admin.subCategory.index',[
                'subcategories'=>$subcategories,
            ]);
        }
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subCategory.add_subCategory',[
            'categories'=>$categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category'=>'required',
            'subcategory'=>'required',
            'banner'=>'required|mimes:png,jpg,jpeg',
            'meta_title'=>'required',
            'meta_descp'=>'required',
        ]);
        if($request->hasFile('banner')){
            $file = $request->file('banner');
            $fileName = uniqid().'subCategory'.'.'.$file->extension();
            $path = 'public/backend/upload/subcategory';
            $request->file('banner')->storeAs($path,$fileName);
        }
        $id = Auth::guard('admin')->user()->id;
        Subcategory::insert([
            'added_by'=>$id,
            'category'=>$request->category,
            'subcategory'=>$request->subcategory,
            'banner'=>$fileName,
            'meta_title'=>$request->meta_title,
            'meta_descp'=>$request->meta_descp,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'SubCategory Created Success');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $subcategory_id = Subcategory::find($id);
        return view('admin.subCategory.edit',[
            'categories'=>$categories,
            'subcategory_id'=>$subcategory_id,
        ]);
    }

    public function update(Request $request, $id)
    {
        if($request->file('banner') == ''){
            $request->validate([
                'category'=>'required',
                'subcategory'=>'required',
                'meta_title'=>'required',
                'meta_descp'=>'required',
            ]);
            Subcategory::find($id)->update([
                'category'=>$request->category,
                'subcategory'=>$request->subcategory,
                'meta_title'=>$request->meta_title,
                'meta_descp'=>$request->meta_descp,
            ]);
            return redirect()->route('subCategory.index')->with('success', 'Subcategory Updated');
        }
        else{
           if($request->hasFile('banner')){
            $request->validate([
                'category'=>'required',
                'subcategory'=>'required',
                'banner'=>'required|mimes:png,jpg,jpeg',
                'meta_title'=>'required',
                'meta_descp'=>'required',
            ]);
              //delete old file
              $oldFile = Subcategory::find($id)->banner;
              $oldPath ='storage/backend/upload/subcategory/'.$oldFile;
              File::delete(public_path($oldPath));
             //new file location and name
              $file = $request->file('banner');
              $fileName = 'subCategory'.uniqid().'.'.$file->extension();
              $path = 'public/backend/upload/subcategory';
              $request->file('banner')->storeAs($path,$fileName);
           }
           Subcategory::find($id)->update([
            'category'=>$request->category,
            'subcategory'=>$request->subcategory,
            'banner'=>$fileName,
            'meta_title'=>$request->meta_title,
            'meta_descp'=>$request->meta_descp,
        ]);
        return redirect()->route('subCategory.index')->with('success', 'Subcategory Updated');
        }
    }

    public function destroy($id)
    {
        $file = Subcategory::find($id)->banner;
        $path = 'storage/backend/upload/subcategory/'.$file;
        File::delete(public_path($path));

        Subcategory::find($id)->delete();
        return redirect()->route('subCategory.index')->with('success', 'Subcategory Deleted');
    }
}
