<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function show(){
        return view('register');
    }

    public function register(Request $request){
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $name = $request->input('name');

        $user = user::create([
            'email'=>$email,
            'password'=>$password,
            'name'=>$name
        ]);

        auth()->login($user);
        return redirect('/home');
    }
}
