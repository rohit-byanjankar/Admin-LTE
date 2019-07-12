<?php

namespace Modules\UserRoles\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\UserRoles\Entities\Permission;
use Modules\UserRoles\Entities\Role;

class PermissionControllerApi extends Controller
{
    public function selectRole(){
        $roles= Role::all();
        if (count($roles) > 0){
            return response()->json(['data' => $roles,'message ' => 'Role retrieved succesfully']);
        }else{
            return response()->json(['message' => 'Role not found']);
        }
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
        $data=['Permission Available' => $roles , 'Models' => $permissions , 'RoleName' => $roleName];
        if (count($roles) > 0){
            return response()->json(['data' => $data, 'message ' => 'Permissions of current role retrieved succesfully']);
        }else{
            return response()->json(['message ' => 'No Permissions of current role']);
        }
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
        return response()->json(['message' => 'Permission updated succesfully']);
    }
}
