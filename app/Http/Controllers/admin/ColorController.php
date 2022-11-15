<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(Request $request)
    {
        $ColorSearch = $request->color;
        if($ColorSearch != ''){
            $colors =Color::where('name', 'like', '%'.$ColorSearch.'%')->paginate(2);
        }
        else{
            $colors = Color::paginate(10);
        }
        return view('admin.color.index',compact('colors'));
    }

    public function create()
    {
        return view('admin.color.add_color');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'code'=>'required',
        ]);
        Color::insert([
            'name'=>$request->name,
            'code'=>$request->code,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Color Added Successfull');
    }

    public function edit($id)
    {
        $color_id = Color::find($id);
        return view('admin.color.edit',compact('color_id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'code'=>'required',
        ]);
        Color::find($id)->update([
            'name'=>$request->name,
            'code'=>$request->code,
        ]);
        return redirect()->route('color.index')->with('success', 'Color Updated');
    }

    public function destroy($id)
    {
        Color::find($id)->delete();
        return redirect()->route('color.index')->with('success', 'Color Deleted');
    }
}
