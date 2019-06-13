<?php

namespace Modules\UserRoles\Http\Controllers;

use App\Role;
use App\Permission;
use App\Category;
use App\Tag;
use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function selectRole(){
        $roles= Role::all();
        return view('userroles::rolePermission.selectRole',compact('roles'));
    }

    public function getPermission($roleName){

        $roles=Permission::where("role",$roleName)->get();
        $models=config("adminlte.models"); //["App\Post","App\Tag","App\Category","App\User"];
        
        $permissions=[];
        
        foreach($models as $modelname){
            $m=new $modelname;
            $permission=$m->getPermissions();
            $permissions[$modelname]=$permission;
        }
        return view('userroles::rolePermission.permission',compact('permissions','roles','roleName'));
    }

    public function checkPermissionPost(Request $r){
        $checked=$r->checked;
        $roles=$r->role;
        $permissions=$r->permission_granted;
        $models=$r->model;
        $inputArray=[];
        $allPermissions=Permission::where("role",$roles[0])->delete();
        if($checked){
                foreach($checked as $index){
            $inputArray=["role"=>$roles[$index],"permission_granted"=>$permissions[$index],"model"=>$models[$index]];

            Permission::create($inputArray);
            }
        }

        return redirect()->back()->with("success","Successfully Updated permissions");
    }
}
