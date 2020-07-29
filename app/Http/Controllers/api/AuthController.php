<?php

namespace App\Http\Controllers\api;

use Helper;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Notifications\VerifyUser; 

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $user=User::where('email',$request->email)->first();
        if(!$user){
            User::where('phone_number',$request->email)->first();
        }

        if (!$user){
            return response(['status'=>'error','message'=>'We are unable to find your email'],201);
        }
        if ($user->deactivated == 1){
            return response(['status'=>'error','message'=>'You have not been activated'],201);
        }
        if (Auth::attempt(["email"=>$user->email,"password"=>$request->password])){
              $token = $user->createToken('Personal Access Token')->accessToken;
              $response = ['token' => $token];
            /*
            $http = new Client;

            $response = $http->post(url('oauth/token'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '4',
                    'client_secret' => '0sga29XN5knuY0Iw8bIeyglGnyrltY7kwnA0L8Gy',
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ],
            ]);*/

            return response(['token' => $response,'token_type'=>'Bearer'
                             ,'userData' => $user],200) ;
        }else{
             $response = ["message" => "Incorrect Username or password"];
            return response($response, 201);
        }
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'max:20||min:3||nullable||regex:/^[a-zA-Z ]+$/',
            'email' => 'unique:users',
            'phone_number'=>'unique:users',
        ]);

        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $uname = $request->input('name');
        $phone = $request->phone_number;
        $address = $request->get('address');
        $image = $request->file('image');
        $destinationPath = 'uploads/';
        $profession = $request->get('profession');
        $service = $request->get('service');

        $user = User::create([
            'email' => $email,
            'password' => $password,
            'name' => $uname,
            'image' => '-',
            'phone_number' => $phone,
            'address' => $address,
            'profession'=>$profession,
            'service_provider'=>$service
        ]);
        if($user){
        //$user->image = Helper::uploadFile($destinationPath, $image); //using helper file
        //$user->save();
            //once user is created admins will be send to verify the user.
            $admins = User::where('role', 'superadmin')->get();
            foreach ($admins as $admin) {
            $admin->notify(new VerifyUser($user));
            }


            $token = $user->createToken('Personal Access Token')->accessToken;
            $response = ['token' => $token];
            $message=['message'=>'Thank you for registering'];
            return response(['token' => $response,'token_type'=>'Bearer'
                             ,'userData' => $user],200) ;
        }else{
            $message=['message'=>'Registration was not successful, please try again later'];
            return response(['token' => $response,'token_type'=>'Bearer'
                             ,'userData' => $user],201) ;
        }
    }

     public function updateUser(Request $request){
        $email = $request->input('email');

        $password = ($request->password==null)?'':bcrypt($request->input('password'));
        $uname = $request->input('name');
        $phone = $request->phone_number;
        $address = $request->get('address');
        $image = $request->file('image');
        $destinationPath = 'uploads/';
        $profession = $request->get('profession');
        $service = $request->get('service');
        $userid=$request->user_id;
        $about=$request->about;
        $user = User::where('id',$userid)->first();
        if($user){
            $user->email=$email;
            $user->name=$uname;
            $user->phone_number=$phone;
            $user->address=$address;
            $user->profession=$profession;
            $user->service_provider=$service;
            $user->about=$about;
            if($password!=''){
                $user->password=$password;
            }
            if(!$image==null){
            $user->image = Helper::uploadFile($destinationPath, $image); //using helper file
            }
            $user->save();
            $message=['message'=>'Successfully Updated','userData' => $user];
            return response($message,200) ;
        }else{
            $message=['message'=>'Update Unsuccessful'];
            return response($message,201) ;
        }
    }

    public function logout(Request $request) {
        $token = $request->user()->token();
        dd($token);
        $token->revoke();
        $response = ['message' => 'You have logged out!'];
        return response($response, 200);
        }
}
