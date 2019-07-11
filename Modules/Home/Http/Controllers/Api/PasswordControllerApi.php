<?php

namespace Modules\Home\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordControllerApi extends Controller
{
    public function change(Request $request)
    {
        $user=Auth::user();
        if (!(Hash::check($request->get('oldPassword'), $user->password))) {
            // The passwords matches
            return response()->json(['message' => 'Your current password does not matches with the password you provided. Please try again.']);
        }
        if(strcmp($request->get('oldPassword'), $request->get('newPassword')) == 0){
            //Current password and new password are same
            return response()->json(['message' => 'New Password cannot be same as your current password.Please choose a different password.']);
        }
        if(!strcmp($request->get('repeatPassword'), $request->get('newPassword')) == 0){
            //Current password and new password are same
            return response()->json(['message' => 'Passwords do not match.']);
        }
        //Change Password
        $user->password = bcrypt($request->get('newPassword'));
        $user->update();
        return response()->json(['message' => 'Passwords do not match.']);
    }
}
