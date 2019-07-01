<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as IlluminateUser;

class PasswordController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function change(Request $request)
    {
        $user=Auth::user(); 
        if (!(Hash::check($request->get('oldPassword'), $user->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('oldPassword'), $request->get('newPassword')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        if(!strcmp($request->get('repeatPassword'), $request->get('newPassword')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Passwords do not match.");
        }
        //Change Password
        $user->password = bcrypt($request->get('newPassword'));
        $user->update();
        return redirect()->back()->with("success","Password changed successfully !");
    }
}

   