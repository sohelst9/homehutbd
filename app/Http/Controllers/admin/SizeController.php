<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(Request $request)
    {
        $sizeSearch = $request->size;
        if($sizeSearch != ''){
            $sizes =Size::where('name', 'like', '%'.$sizeSearch.'%')->get();
        }
        else{
            $sizes = Size::all();
        }
        return view('admin.size.index',compact('sizes'));
    }

    public function create()
    {
        return view('admin.size.add_size');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        Size::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Size Added Successfull');
    }

    public function edit($id)
    {
        $size_id = Size::find($id);
        return view('admin.size.edit',compact('size_id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);
        Size::find($id)->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('size.index')->with('success', 'Size Updated');
    }

    public function destroy($id)
    {
        Size::find($id)->delete();
        return redirect()->route('size.index')->with('success', 'Size Deleted');
    }
}
