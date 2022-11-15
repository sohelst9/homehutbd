<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function manage_my_account(){
        return view('frontend.accounts.manage_account');
    }
}
