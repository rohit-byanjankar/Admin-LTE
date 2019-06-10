<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use App\Category;
use App\Tag;
use App\User;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function selectRole(){
        $roles= Role::all();
        return view('rolePermission.selectRole',compact('roles'));
    }

    public function getPermission(Request $request){
        
        $roleName=$request->input('roleID');
        $roles=Permission::where("role",$roleName)->get();
        $models=config("adminlte.models"); //["App\Post","App\Tag","App\Category","App\User"];
        
        $permissions=[];
        
        foreach($models as $modelname){
            $m=new $modelname;
            $permission=$m->getPermissions();
            $permissions[$modelname]=$permission;
        }
        return view('rolePermission.permission',compact('permissions','roles','roleName'));
    }

    public function checkPermissionPost(Request $r){
        dd($r->all());
    }
}
