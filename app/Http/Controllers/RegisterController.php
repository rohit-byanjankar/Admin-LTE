<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\UserRoles\Entities\User;

class RegisterController extends Controller
{
    public function show(){
        return view('register');
    }

    public function register(Request $request){
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $uname = $request->input('name');
       
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
            
        ]);

        auth()->login($user);
        return redirect('/home');
    }
}
