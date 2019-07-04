<?php

namespace App\Http\Controllers;

use App\Notifications\userReactivated;
use App\Notifications\VerifyUser;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Helper;
class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'unique:users||max:20||min:3||nullable||regex:/^[a-zA-Z ]+$/',
            'phone' => 'numeric||digits_between:7,10',
            'email' => 'unique:users'
        ]);

        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $uname = $request->input('name');
        $phone = $request->phoneNumber;
        $address = $request->get('address');
        $image = $request->file('image');
        $destinationPath = 'uploads/'; 

        $user = user::create([
            'email' => $email,
            'password' => $password,
            'name' => $uname,
            'image' => '-',
            'phone_number' => $phone,
            'address' => $address,
        ]);
        $user->image = Helper::uploadFile($destinationPath, $image); //using helper file
        $user->save();

        $admin=User::where('role','superadmin')->first();
        if($admin){
            $admin->notify(new VerifyUser($user));
        }
        return view('thankYou');

    }

    public function userDeactivated(){
        return view('userDeactivate');
    }

    public function reActivatedEmail(Request $request){
        $email=$request->email;
        $password=$request->password;
        $phone_number=$request->phone_number;
        if ($email == Auth::user()->email && Hash::check($password,Auth::user()->password) && $phone_number == Auth::user()->phone_number)
        {
            $user=Auth::user();
            $admin=User::where('role','superadmin')->first();
            if($admin){
                $admin->notify(new userReactivated($user));
            }
        return redirect()->back()->with('success','Sent notification to admin for re-activation of your account');
        }else{
            return redirect()->back()->with('error','Credentials don\'t match');
        }
    }
}
