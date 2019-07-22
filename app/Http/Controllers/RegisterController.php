<?php

namespace App\Http\Controllers;

use App\Notifications\userReactivate;
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
        $profession = $request->get('profession');
        $user = user::create([
            'email' => $email,
            'password' => $password,
            'name' => $uname,
            'image' => '-',
            'phone_number' => $phone,
            'address' => $address,
            'profession' => $profession,
        ]);
            $user->image = asset('uploads/default.png');
             $user->save();

        $admins = User::where('role', 'superadmin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new VerifyUser($user));
        }
        return redirect('/login')->with('success', 'You have succesfully registered.Please wait for our admin to verify you.');
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
                $admin->notify(new userReactivate($user));
            }
            return redirect()->back()->with('success','Sent notification to admin for re-activation of your account');
        }else{
            return redirect()->back()->with('error','Credentials don\'t match');
        }
    }
}

