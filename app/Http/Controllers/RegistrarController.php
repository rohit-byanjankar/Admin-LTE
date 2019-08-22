<?php

namespace App\Http\Controllers;

use App\Registrar;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registrar.index')->with('settings',Registrar::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cname' => 'required',
            'dbname' => 'required',
            'curl' => 'required',
            'dbusername' => 'required',
            'dbpass' => 'required',
        ]);
        $settings=Registrar::create([
            'community_name'=>$request->cname,
            'community_url'=>$request->curl,
            'database_name'=>$request->dbname,
            'database_username'=>$request->dbusername,
            'database_password'=>$request->dbpass,
        ]);
        $settings->save();
        session()->flash('sucs', 'Registrar created Successfully.');
        return redirect(route('registrar.index'));
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
    public function edit($id)
    {
        $settings=Registrar::find($id);
        return view('registrar.edit',compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cname' => 'required',
            'dbname' => 'required',
            'curl' => 'required',
            'dbusername' => 'required',
            'dbpass' => 'required',
        ]);
        $settings=Registrar::find($id);
        $settings->community_name = $request->cname;
        $settings->database_name = $request->dbname;
        $settings->community_url = $request->curl;
        $settings->database_username = $request->dbusername;
        $settings->database_password= $request->dbpass;

        $settings->save();
        session()->flash('sucs', 'Registrar Updated Successfully.');
        return redirect(route('registrar.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting=Registrar::find($id);
        $setting->delete();

        session()->flash('err', 'Registrar Deleted Successfully.');
        return redirect()->back();
    }
}
