<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfoWidget;
use App\Models\Copyright;
use App\Models\HeaderSetting;
use App\Models\StayInformed;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WebsiteSetupController extends Controller
{
    //index
    public function index(){
        $headerinfo = HeaderSetting::latest()->first();
        $contactinfoWidget = ContactInfoWidget::latest()->first();
        $StayInformed = StayInformed::latest()->first();
        $copyright = Copyright::latest()->first();
        return view('admin.website-setup.index', compact('headerinfo', 'contactinfoWidget', 'StayInformed', 'copyright'));
    }

    //headerSetting_store
    public function headerSetting_store(Request $request){
        $request->validate([
            // 'site_icon'=>'required',
            // 'site_logo'=>'required',
            // 'help_number'=>'required',
        ]);

        $count = HeaderSetting::count();
        if($count == 1){
            HeaderSetting::find($request->headersetting_id)->update([
                'help_number'=>$request->help_number,
            ]);
            if($request->hasfile('site_icon')){
                 //delete old file
                $oldFile = HeaderSetting::find($request->headersetting_id)->site_icon;
                $oldPath ='storage/backend/upload/site_icon/'.$oldFile;
                File::delete(public_path($oldPath));
                // upload new file
                $extension = $request->file('site_icon')->extension();
                $site_icon_name = uniqid().'site_icon'.'.'.$extension;
                $request->file('site_icon')->storeAs('public/backend/upload/site_icon', $site_icon_name);

                HeaderSetting::find($request->headersetting_id)->update([
                    'site_icon'=>$site_icon_name,
                ]);
            }

            if($request->hasfile('site_logo')){
                //delete old file
                $oldsite_logo = HeaderSetting::find($request->headersetting_id)->site_logo;
                $oldPath ='storage/backend/upload/site_logo/'.$oldsite_logo;
                File::delete(public_path($oldPath));
                //upload new file
                $extension = $request->file('site_logo')->extension();
                $site_logo_name = uniqid().'site_logo'.'.'.$extension;
                $request->file('site_logo')->storeAs('public/backend/upload/site_logo', $site_logo_name);

                HeaderSetting::find($request->headersetting_id)->update([
                    'site_logo'=>$site_logo_name,
                ]);
            }

            
        }

        if($count == 0){
            if($request->hasfile('site_icon')){
                $extension = $request->file('site_icon')->extension();
                $site_icon_name = uniqid().'site_icon'.'.'.$extension;
                $request->file('site_icon')->storeAs('public/backend/upload/site_icon', $site_icon_name);
            }
    
            if($request->hasfile('site_logo')){
                $extension = $request->file('site_logo')->extension();
                $site_logo_name = uniqid().'site_logo'.'.'.$extension;
                $request->file('site_logo')->storeAs('public/backend/upload/site_logo', $site_logo_name);
            }
    
            HeaderSetting::insert([
                'site_icon'=>$site_icon_name ?? null,
                'site_logo'=>$site_logo_name ?? null,
                'help_number'=>$request->help_number ?? null,
                'created_at'=>Carbon::now(),
            ]);
        }

        return back()->with('success', 'Header Setting Updated');


    }

    //contactInfoWidget_store
    public function contactInfoWidget_store(Request $request){
        $request->validate([
            'address'=>'required',
            'contact_email'=>'required',
            'contact_phone'=>'required',
        ]);

        $count = ContactInfoWidget::count();
        if($count == 1){
            ContactInfoWidget::find($request->contaceinfowidget_id)->update([
                'address'=>$request->address,
                'email'=>$request->contact_email,
                'number'=>$request->contact_phone,
            ]);
        }
        
        if($count == 0){
            ContactInfoWidget::insert([
                'address'=>$request->address,
                'email'=>$request->contact_email,
                'number'=>$request->contact_phone,
                'created_at'=>Carbon::now(),
            ]);
            
        }
        return back()->with('success', 'Contace Info Widget Updated');
    }

    //stayInformed_store
    public function stayInformed_store(Request $request){
        $request->validate([
            'description'=>'required',
        ]);

        $count = StayInformed::count();
        if($count == 1){
            StayInformed::find($request->StayInformed_id)->update([
                'description'=>$request->description,
                'playstore_link'=>$request->play_Store,
                'appstore_link'=>$request->app_store,
            ]);
        }
        
        if($count == 0){
            StayInformed::insert([
                'description'=>$request->description,
                'playstore_link'=>$request->play_Store,
                'appstore_link'=>$request->app_store,
                'created_at'=>Carbon::now(),
            ]);
            
        }
        return back()->with('success', 'Stay Informed Widget Updated');
    }

    //copyright_store
    public function copyright_store(Request $request){
        $request->validate([
            'copyright'=>'required',
        ]);

        $count = Copyright::count();
        if($count == 1){
            Copyright::find($request->copyright_id)->update([
                'copyright'=>$request->copyright,
            ]);
        }
        
        if($count == 0){
            Copyright::insert([
                'copyright'=>$request->copyright,
            ]);
            
        }
        return back()->with('success', 'Copyright Text Updated');
    }
}
