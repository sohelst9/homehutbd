<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //----admin login index----
    public function index(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        else{
            return view('admin.admin_login');
        }
    }

    //----admin login create----
    public function login(Request $request){
        $check = $request->all();
        //check email and password admin table
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'] ])){
                return redirect()->route('admin.dashboard')->with('success', 'Admin Login Successfully');
        }
        else{
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    //----admin dashboard----
    public function dashboard(){
        return view('admin.dashboard');
    }

    //----admin logout----
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('error', 'Admin Logout Successfully');
    }

    //----admin register----
    public function AdminRegister(){
         return view('admin.register');
    }

    //----admin register insert----
    public function AdminRegisterInsert(Request $request){
        $request->validate([
            'username'=>'required',
            'phone'=> ['required', 'unique:admins,phone', 'min:11', 'max:11'],
            'email'=>'required|email|unique:admins,email',
            'profile_image'=>'required|mimes:png,jpg,jpeg',
            'password'=>'required|min:6',
            'password_confirmation'=>'required_with:password|same:password|min:6',
        ]);

        if($request->hasFile('profile_image')){
            $file = $request->file('profile_image');
            $file_name ='admin'.uniqid().'.'.$file->getClientOriginalExtension();
           // $path = 'public/backend/admin';
            $path = public_path('/images/admin');
            //$file_location = $request->file('profile_image')->storeAs($path,$file_name);
            $file_location = $request->file('profile_image')->move($path,$file_name);
        }
        admin::insert([
            'username'=>$request->username,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'profile_image'=>$file_name,
            'password'=>Hash::make($request->password),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Admin Register Successfully');
    }
    //profile
    public function profile(){
        $profile = Auth::guard('admin')->user();
        return view('admin.profile',[
            'profile'=>$profile,
        ]);
    }
    //Admin profile update
    public function profile_update(Request $request){
        if($request->profile_image == ''){
            $request->validate([
                'username'=>'required',
                'phone'=> 'required',
                'email'=> 'required',
            ]);
            admin::find($request->admin_id)->update([
                'username'=>$request->username,
                'phone'=>$request->phone,
                'email'=>$request->email,
            ]);
            return redirect()->route('admin.profile')->with('success', 'Profile Update Successfully');
        }
        else{
            if($request->hasFile('profile_image')){
                $request->validate([
                    'profile_image'=>'required|mimes:png,jpg,jpeg',
                ]);
                $files = admin::find($request->admin_id)->profile_image;
                $file_path ='images/admin/'.$files;
                File::delete(public_path($file_path));
                //file new location
                $file_name1 = $request->profile_image;
                $new_file_names =uniqid().'admins'.'.'.$file_name1->getClientOriginalExtension();
                //$paths ='public/backend/admin';
                $paths = public_path('/images/admin');
                //$file_locations = $request->file('profile_image')->storeAs($paths,$new_file_names);
                $file_locations = $request->file('profile_image')->move($paths,$new_file_names);
            }
            admin::find($request->admin_id)->update([
                'username'=>$request->username,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'profile_image'=>$new_file_names,
            ]);
            return redirect()->route('admin.profile')->with('success', 'Profile Update Successfully');
        }
    }
    // password_change
    public function password_change(){
        $Auth_password_id = Auth::guard('admin')->user();
        return view('admin.password_change',[
            'Auth_password_id'=>$Auth_password_id,
        ]);
    }
    //password_update
    public function password_update(Request $request){
        $request->validate([
            'password'=>'required|min:6',
            'password_confirmation'=>'required_with:password|same:password|min:6',
        ]);
        admin::find($request->admin_id)->update([
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('admin.change.password')->with('success', 'Password Change Success');
    }
    
}
