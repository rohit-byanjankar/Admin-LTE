<?php

namespace Modules\TelephoneDirectory\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\TelephoneDirectory\Entities\PhoneCategory;

class TelephoneCategoryControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $phoneCategory=PhoneCategory::all();
        if (count($phoneCategory) > 0){
            return response()->json(['data' => $phoneCategory,'message' => 'phoneCategory retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No PhoneCategory found']);
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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $phoneCategory=PhoneCategory::create([  //Category is model(table) and create is a function provided by model class
            'name'=> $request->name  // the first name is column in database and second name is form name
        ]);
        return response()->json(['data' => $phoneCategory,'message' => 'phoneCategory created succesfully']);
    }

    public function show($id)
    {
        $phoneCategory=PhoneCategory::find($id);
        if (count($phoneCategory) > 0){
            return response()->json(['data' => $phoneCategory,'message' => 'One phoneCategory retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No PhoneCategory found']);
        }
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request,$id )
    {
        $request->validate([
            'name' => 'required'
        ]);
        $phoneCategory=PhoneCategory::find($id);
        $phoneCategory->update([  //Category is model(table) and create is a function provided by model class
            'name'=> $request->name  // the first name is column in database and second name is form name
        ]);
        $phoneCategory->save();
        return response()->json(['data' => $phoneCategory,'message' => 'phoneCategory edited succesfully']);
    }

    public function destroy($id)
    {
        $phoneCategory=PhoneCategory::find($id);
        $phoneCategory->delete();
        if (count($phoneCategory) > 0){
            return response()->json(['data' => $phoneCategory,'message' => 'phoneCategory deleted succesfully']);
        }else{
            return response()->json(['message' => 'No PhoneCategory found']);
        }
    }
}
