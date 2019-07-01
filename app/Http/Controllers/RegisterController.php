<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $phone = $request->phone;
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

        auth()->login($user);
        return redirect('/home');
    }
}
