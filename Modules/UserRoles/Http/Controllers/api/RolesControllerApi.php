<?php

namespace Modules\UserRoles\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\UserRoles\Entities\Role;

class RolesControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles=Role::all();
        if (count($roles) > 0){
            return response()->json(['data' => $roles,'message' => 'Roles retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No Roles found']);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $roles=Role::create([
            'name'=> $request->name
        ]);

        return response()->json(['data' => $roles,'message' => 'Role created succesfully']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $roles=Role::find($id);
        if ($roles->count() > 0){
            return response()->json(['data' => $roles,'message' => 'One Role retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No Roles found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $roles=Role::find($id);
        $request->validate([
            'name' => 'required'
        ]);

        $roles->name = $request->name;
        $roles->save();

        if ($roles->count() > 0){
            return response()->json(['data' => $roles,'message' => 'Role updated succesfully']);
        }else{
            return response()->json(['message' => 'No Role found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $roles=Role::find($id);
        $roles->delete();

        if ($roles->count() > 0){
            return response()->json(['data' => $roles,'message' => 'Role deleted succesfully']);
        }else{
            return response()->json(['message' => 'No Role found']);
        }
    }
}
