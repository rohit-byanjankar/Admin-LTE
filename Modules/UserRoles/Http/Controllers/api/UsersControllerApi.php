<?php

namespace Modules\UserRoles\Http\Controllers\api;

use App\Http\Requests\UpdateProfileRequest;
use App\Notifications\emailActivated;
use App\Notifications\VerifiedUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UsersControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $users=User::all();
        if (count($users) > 0){
            return response()->json(['data' => $users,'message ' => 'Users retrieved succesfully']);
        }else{
            return response()->json(['message' => 'User not found']);
        }
    }

    public function edit()
    {
        $users=Auth::user();
        if ($users){
            return response()->json(['data' => $users,'message ' => 'Logged User retrieved succesfully']);
        }else{
            return response()->json(['message' => 'User not found']);
        }
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);
        session()->flash('sucs', 'User profile is updated successfully.');
        if ($user){
            return response()->json(['data' => $user,'message ' => 'User updated succesfully']);
        }
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'superadmin';
        $user->save();

        return response(['message' => 'Promoted to superadmin']);
    }

    public function verifyUser($id, Request $request)
    {
        $user = User::where('id', $id)->first();
        switch ($request->input('activate')) {
            case 'verifyUser':
                $user->verify = 1;
                $user->email_verified_at = now();
                $user->save();
                $user->notify(new VerifiedUser($user));
                return response()->json(['message' => 'User verified succesfully']);
                break;

            case 'activateUser':
                $user->deactivated = 0;
                $user->save();
                $user->notify(new emailActivated());
                return response()->json(['message' => 'User activated succesfully']);
                break;
        }
    }
}
