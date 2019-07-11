<?php

namespace Modules\UserRoles\Http\Controllers;

use Illuminate\Http\Request;
use Modules\UserRoles\Entities\Role;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userroles::roles.index')->with('roles',Role::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userroles::roles.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Role::create([  
            'name'=> $request->name 
          ]);

          session()-> flash('sucs','Role added successfully');

          return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('userroles::roles.create')-> with('role', $role);
    }

    
    public function update(Request $request, Role $role)
    {
        $role->update([
            'name'=> $request->name
        ]);

        $role->save();

        session()-> flash('sucs','Role Updated Successfully');
        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        session()-> flash('err', 'Deleted Successfully');
        return redirect(route('roles.index'));
    }
}
