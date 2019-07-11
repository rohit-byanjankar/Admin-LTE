<?php

namespace App;

use App\Notifications\resetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Modules\UserRoles\Entities\Permission;
use Modules\Classified\Entities\Classified;
use Modules\Article\Entities\Post;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $connection='mysql2';
    protected $fillable = [
        'name', 'email', 'password','about', 'image','role','phone_number','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->role == 'superadmin';
    }

    public function isVerified()
    {
        return $this->verify == 1;
    }

    public function isDeactivated()
    {
        return $this->deactivated == 0;
    }

    public function posts()
    {
        //return $this->hasMany('App\Post');
        return $this->hasMany(Post::class);
    }

    public function advertisements()
    {
        
        return $this->hasMany(Classified::class);
    }

    public function getPermissions(){
        return ["delete", "update", "create", "view"];
    }

    public function getCustomAttribute()
    {
        $userRole = Auth::user()->role; //get the role of the user who just login
        $permissions = Permission::where('role',$userRole)->select('model','permission_granted')->get(); /*get the permission of the
            role which the logged in user belongs to*/

        $permission_granted=[];
        foreach ($permissions as $permission){
            {
                $role=$userRole;
                if(!isset($permission_granted[$role])){
                    $permission_granted[$role]=[];
                }

                $model=$permission->model;
                if(!isset($permission_granted[$role][$model])){
                    $permission_granted[$role][$model]=[];
                }

                $permission_available=$permission->permission_granted;
                array_push($permission_granted[$role][$model],$permission_available);
            }
        }
        return $permission_granted;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new resetPassword($token));
    }
}


