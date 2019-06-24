<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\UserRoles\Entities\Permission;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials))
        {
//            $role = Auth::user()->role; //get the role of the user who just login
//            $permission = Permission::where('role',$role)->select('model','permission_granted')->get(); /*get the permission of the
//            role which the logged in user belongs to*/
//            $p = $permission->toArray();
            //dd(Auth::user()->custom);
            $credentials['role']='admin';
            if (Auth::attempt($credentials)) {
                //user is admin
                return redirect('/adminpanel');
            }else{
                //user isn't admin
                return redirect('/home');
            }
        }
    }
}
