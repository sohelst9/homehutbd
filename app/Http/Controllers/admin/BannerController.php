<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $a= $request->input('banner_search');
        if($a != ''){
            $all_banner = Banner::where('title', 'like', '%'.$a.'%')
            ->latest()
            ->paginate(2);
        }
        else{
            $all_banner = Banner::latest()
            ->paginate(5);
        }
        return view('admin.banner.index',[
            'all_banner'=>$all_banner,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'banner'=>'required|mimes:png,jpg,jpeg',
            'subtitle'=>'required',
            'discount'=>'required',
        ]);
        if($request->hasFile('banner')){
            $file = $request->file('banner');
            $file_name = 'banner'.uniqid().'.'.$file->getClientOriginalExtension();
            $file_path = public_path('/images/banner');
            $file_location = $request->file('banner')->move($file_path,$file_name);
        }
        $admin_id =Auth::guard('admin')->user()->id;

        Banner::insert([
            'admin_id'=>$admin_id,
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'discount'=>$request->discount,
            'banner'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Banner Created Success');
    }

   
    public function edit($id)
    {
        $banner_id = Banner::find($id);
        return view('admin.banner.edit',[
            'banner_id'=>$banner_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // return $request->all();
        if($request->hasFile('banner') == ''){
            $request->validate([
                'title'=>'required',
                'subtitle'=>'required',
                'discount'=>'required',
           ]);
           Banner::find($id)->update([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'discount'=>$request->discount,
           ]);
           return redirect()->route('banner.index')->with('success', 'Banner Updated');
           }
           
           else{
            if($request->hasFile('banner')){
                $request->validate([
                    'title'=>'required',
                    'subtitle'=>'required',
                    'discount'=>'required',
                    'banner'=>'required|mimes:png,jpg,jpeg',
                ]);
                $banner = Banner::find($id)->banner;
                $banner_path ='/images/banner/'.$banner;
                File::delete(public_path($banner_path));
                // create banner new location
                $bannerName = $request->file('banner');
                $newFileName = uniqid().'banners'.'.'.$bannerName->extension();
                $path = public_path('/images/banner');
                $location = $request->file('banner')->move($path,$newFileName);
    
                Banner::find($id)->update([
                    'banner'=>$newFileName,
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'discount'=>$request->discount,
                ]);
                return redirect()->route('banner.index')->with('success', 'Banner Updated');
            }
    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner_name = Banner::find($id)->banner;
        $bannerPath ='/images/banner/'.$banner_name;
        File::delete(public_path($bannerPath));

        Banner::find($id)->delete();
        return redirect()->route('banner.index')->with('success', 'Banner Deleted');
    }

    //status
    public function status($id){
        $banner = Banner::find($id);
        if($banner->status == 0){
            Banner::find($id)->update([
                'status'=>1
            ]);
        }
        else{
            Banner::find($id)->update([
                'status'=>0
            ]);
        }

        return redirect()->route('banner.index')->with('success', 'Banner Status Updated');

    }
}
