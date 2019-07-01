<?php

namespace App\Http\Controllers;

use App\Notifications\VerifyUser;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Notification;

class RegisterController extends Controller
{
    public function show(){
        return view('register');
    }

    public function register(Request $request){
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $uname = $request->input('name');
        $phone = $request->phoneNumber;
        $address = $request->get('address');
       
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/');
            $image-> move($destinationPath,$name);
            $img = '/uploads/'.$name;
        

        $user = user::create([
            'email'=>$email,
            'password'=>$password,
            'name'=>$uname,
            'image' => $img,
            'phone_number'=> $phone,
            'address'=> $address,
            
        ]);

        $admin=User::where('role','superadmin')->first();
        if($admin){
            $admin->notify(new VerifyUser($user));
        }
        return redirect()->back();
    }
}
