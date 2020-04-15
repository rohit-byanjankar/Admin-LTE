<?php

namespace App\Http\Controllers\api;

use Helper;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'min:7',
        ]);

        $user=User::where('email',$request->email)->first();
        if (!$user){
            return response(['status'=>'error','message'=>'User not found']);
        }
        if ($user->deactivated == 1){
            return response(['status'=>'error','message'=>'This user isn\'t activated']);
        }
        if ($user->verify == 0){
            return response(['status'=>'error','message'=>'This user isn\'t verified']);
        }

        if (Hash::check($request->password,$user->password)){
            $http = new Client;

            $response = $http->post(url('oauth/token'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => '0sga29XN5knuY0Iw8bIeyglGnyrltY7kwnA0L8Gy',
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ],
            ]);

            return response(['data' => json_decode((string) $response->getBody(), true)
                             ,'userData' => $user]) ;
        }
    }

    public function register(Request $request){
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

        $user = User::create([
            'email' => $email,
            'password' => $password,
            'name' => $uname,
            'image' => '-',
            'phone_number' => $phone,
            'address' => $address,
        ]);
        $user->image = Helper::uploadFile($destinationPath, $image); //using helper file
        $user->save();

        $message=['message'=>'Thank you for registering'];
        return response()->json(['data'=>$message],201) ;
    }
}
