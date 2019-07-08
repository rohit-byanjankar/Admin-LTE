<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Helper;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
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
            if (file_exists($old_image)) {
                unlink($old_image);
            }

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

        return redirect()->back()->with("success", "Your info was changed successfully !");
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

        switch ($request->input('remove')) {
            case 'deactivate':


                if ($email != $request->email || !Hash::check($request->password, $password)) {
                    return redirect()->back()->with('error', "Password or Email doesn't match");
                } else {

                    $user->verify = 0;
                    $user->deactivated = 1;
                    $user->save();
                    return redirect('/logout')->with('success', 'Your Account is Deactivated');
                }
                break;

            case 'delete':
                if ($email != $request->email || !Hash::check($request->password, $password)) {
                    return redirect()->back()->with('error', "Password or Email doesn't match");
                } else {

                    $user->delete();
                    return redirect('/logout')->with('success', 'Your Account is deleted');
                }
                break;
        }
    }
}
