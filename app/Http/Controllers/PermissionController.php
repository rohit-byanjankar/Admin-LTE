<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Http\Controllers\role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function selectRole(){
        $roles= Permission::all();
        return view('rolePermission.selectRole',compact('roles'));
    }

    public function getPermission(Request $request){
        $roles=Permission::all();
        $roleName=$request->input('roleID');
        $modelName=$request->input('model');
        $models=["App\Post","App\Tag"];
        $permissions=[];
        foreach($models as $modelname){
            $m=new $modelname;
            $permission=$m->getPermissions();
            $permissions[$modelname]=$permission;
        }
        return view('rolePermission.permission',compact('permissions','roles','roleName','modelName'));
    }

    public function checkPermissionPost(Request $r){
        dd($r->all());
    }
}
