<?php

namespace Modules\Home\Http\Controllers\api;

use Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileControllerApi extends Controller
{
    public function change(Request $request)
    {
        $request->validate([
            'name' => 'max:20||min:3||nullable||regex:/^[a-zA-Z ]+$/',
            'phone' => 'nullable||numeric||digits_between:7,10',
            'about' => 'nullable||regex:/^[a-zA-Z ]+$/'
        ]);
        $user = Auth::user();
        if (!$request->name == null) {
            $user->name = $request->name;
        } else {
            $user->name = $user->name;
        }

        if (!$request->about == null) {
            $user->about = $request->about;
        } else {
            $user->about = $user->about;
        }

        //for image
        if (!$request->dp == null) {
            $old_image = $user->image;
            unlink($old_image);

            $image = $request->dp;
            $destinationPath = 'uploads/';

            $user->image = Helper::uploadFile($destinationPath, $image); //using helper file
        } else {
            $user->image = $user->image;
        }

        if (!$request->phone == null) {
            $user->phone_number = $request->phone;
        } else {
            $user->phone_number = $user->phone_number;
        }

        $user->update();
        return response()->json(['message' => 'User updated succesfully']);
    }

    // deactivating account
    public function deactivate(Request $request)
    {
        $user = Auth::user();
        $email = $user->email;
        $password = $user->password;
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        switch ($request->input('action')) {
            case 'deactivate':
                if ($email != $request->email || !Hash::check($request->password, $password)) {
                    return response()->json(['message' => 'Password or Email doesn\'t match']);
                } else {
                    $user->verify = 0;
                    $user->deactivated = 1;
                    $user->save();
                    return response()->json(['success' => 'Your Account has been Deactivated']);
                }
                break;

            case 'delete':
                if ($email != $request->email || !Hash::check($request->password, $password)) {
                    return response()->json(['message' => 'Password or Email doesn\'t match']);
                } else {
                    $user->delete();
                    return response()->json(['success' => 'Your Account has been Deleted']);
                }
                break;
        }
    }
}
