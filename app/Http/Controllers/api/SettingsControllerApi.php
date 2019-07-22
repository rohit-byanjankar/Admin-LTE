<?php

namespace App\Http\Controllers\api;

use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=Settings::all();
        if (count($settings) > 0){
            return response()->json(['data'=>$settings,'message' => 'All Settings retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No Settings found']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return response()->json(['data'=> $settings,'message'=>'Setting stored succesfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settings=Settings::find($id);
        if ($settings->count() > 0){
            return response()->json(['data'=>$settings,'message' => 'One Setting retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No Settings found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $settings=Settings::find($id);
        $settings->value = $request->value;
        $settings->key = $request->key;

        $settings->save();
        return response()->json(['data'=>$settings,'message' => 'Setting updated succesfully']);
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
        $settings=Settings::all();
        if ($settings->count() > 0){
            return response()->json(['data'=>$settings,'message' => 'Setting deleted succesfully']);
        }else{
            return response()->json(['message' => 'No Settings found']);
        }
    }
}
