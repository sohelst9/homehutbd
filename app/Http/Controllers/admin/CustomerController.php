<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //index
    public function index(){
        $customers = User::latest()->paginate(20);
        return view('admin.customer.index', compact('customers'));
    }

    //destroy
    public function destroy($id){
        $customer = User::find($id)->delete();
        return redirect()->route('customerlist.index')->with('success', 'Customer Id Deleted Success');

    }
}
