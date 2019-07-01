<?php

namespace App\Http\Controllers;

use App\Settings;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('basicSettings.index')->with('settings',Settings::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('basicSettings.create');
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
            'key' => 'required',
            'value' => 'required',
        ]);
        $settings=Settings::create($request->all());
        $settings->save();
        session()->flash('sucs', 'Setting added Successfully.');
        return redirect(route('settings.index'));
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
        $settings=Settings::find($id);
        return view('basicSettings.edit',compact('settings'));
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
            'key' => 'required',
            'value' => 'required',
        ]);
        $settings=Settings::find($id);
        $settings->value = $request->value;
        $settings->key = $request->key;

        $settings->save();
        session()->flash('sucs', 'Setting Updated Successfully.');
        return redirect(route('settings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting=Settings::find($id);
        $setting->delete();

        session()->flash('err', 'Setting Deleted Successfully.');
        return redirect()->back();
    }
}
