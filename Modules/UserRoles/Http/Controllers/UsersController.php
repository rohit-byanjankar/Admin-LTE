<?php

namespace Modules\UserRoles\Http\Controllers;

use App\Notifications\VerifiedUser;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class UsersController extends Controller
{
    public function index()
    {

        return view('userroles::users.index')->with('users', User::all());
    }

    public function edit()
    {
        return view('userroles::users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);
        session()->flash('sucs', 'User profile is updated successfully.');
        return redirect()->back();
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'superadmin';
        $user->save();
        session()->flash('sucs', 'User is promoted to superadmin successfully.');
        return redirect(route('users.index'));
    }

    public function verifyUser($id, Request $request)
    {

        $user = User::where('id', $id)->first();
        switch ($request->input('activate')) {
            case 'verifiedUser':
                $user->verify = 1;
                $user->email_verified_at = now();
                $user->save();
                $user->notify(new VerifiedUser($user));
                session()->flash('sucs', 'User is successfully verified.');
                return redirect(route('users.index'));
                break;

            case 'activatedUser':
                $user->deactivated = 0;
                $user->save();
                session()->flash('sucs', 'User is successfully activated.');
                return redirect(route('users.index'));
                break;
        }
    }
}
