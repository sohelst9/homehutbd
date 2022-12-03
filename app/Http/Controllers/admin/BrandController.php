<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brand_search = $request->brand;
        if($brand_search != ''){
            $allBrand = Brand::where('name', 'Like', '%'.$brand_search.'%')->latest()->paginate(5);
        }
        else{
            $allBrand = Brand::latest()->paginate(10);
        }
        return view('admin.brand.index',compact('allBrand'));
    }

    public function create()
    {
        return view('admin.brand.add_brand');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'logo'=>'required|mimes:png,jpg,jpeg',
            'meta_title'=>'required',
            'meta_descp'=>'required',
        ]);
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileName =uniqid().'brand'.'.'.$file->extension();
            $filePath = public_path('images/brand');
            $request->file('logo')->move($filePath,$fileName);
        }
        $admin_id =Auth::guard('admin')->user()->id;

        Brand::insert([
            'added_by'=>$admin_id,
            'name'=>$request->name,
            'logo'=>$fileName,
            'meta_title'=>$request->meta_title,
            'meta_descp'=>$request->meta_descp,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Brand Created Success');
    }


    public function edit($id)
    {
        $brand_id = Brand::find($id);
        return view('admin.brand.edit',compact('brand_id'));
    }

    public function update(Request $request, $id)
    {
        if($request->file('logo') == '' ){
            $request->validate([
                'name'=>'required',
                'meta_title'=>'required',
                'meta_descp'=>'required',
            ]);
            Brand::find($id)->update([
                'name'=>$request->name,
                'meta_title'=>$request->meta_title,
                'meta_descp'=>$request->meta_descp,
            ]);
            return redirect()->route('brand.index')->with('success', 'Brand Updated Success');
        }
        else{
            if($request->hasFile('logo')){
                //remove old file
                $oldFile = Brand::find($id)->logo;
                $oldPath = 'images/brand/'.$oldFile;
                File::delete(public_path($oldPath));
                //upload new file--
                $NewFile = $request->file('logo');
                $NewFileName ='brand'.uniqid().'.'.$NewFile->extension();
                $NewFilePath = public_path('images/brand');
                $request->file('logo')->move($NewFilePath,$NewFileName);
            }
            Brand::find($id)->update([
                'name'=>$request->name,
                'logo'=>$NewFileName,
                'meta_title'=>$request->meta_title,
                'meta_descp'=>$request->meta_descp,
            ]);
            return redirect()->route('brand.index')->with('success', 'Brand Updated Success');
        }
    }

    public function destroy($id)
    {
        $oldFile = Brand::find($id)->logo;
        $oldPath = 'images/brand/'.$oldFile;
        File::delete(public_path($oldPath));

        Brand::find($id)->delete();
        return redirect()->route('brand.index')->with('success', 'Brand Deleted Success');
    }
}
