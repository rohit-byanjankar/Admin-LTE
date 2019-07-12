<?php

namespace Modules\TelephoneDirectory\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\TelephoneDirectory\Entities\PhoneDirectory;

class TelephoneDirectoryControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $phoneDirectory=PhoneDirectory::all();
        if (count($phoneDirectory) > 0){
            return response()->json(['data' => $phoneDirectory,'message' => 'PhoneDirectory retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No PhoneDirectory found']);
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
        $request ->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'city' => 'required',
            'street' => 'required',
            'home_number' => 'required||numeric||digits_between:7,10',
            'mobile_number' => 'required||numeric||digits_between:10,14',
            'office_number' => 'required||numeric||digits_between:7,10',
            'profession' => 'required',
        ]);

        $phoneDirectory=PhoneDirectory::create([       //storing to database
            'first_name'=> $request->fname,
            'middle_name'=> $request->mname,
            'surname'=> $request->lname,
            'city'=> $request->city,
            'street' => $request->street,
            'home_number' => $request->home_number,
            'mobile_number' => $request->mobile_number,
            'office_number' => $request->office_number,
            'profession' => $request->profession,
            'phone_category_id' => $request->category
        ]);
        return response()->json(['data' => $phoneDirectory,'message' => 'PhoneDirectory created succesfully']);
    }

    public function show($id)
    {
        $phoneDirectory=PhoneDirectory::find($id);
        if ($phoneDirectory->count() > 0){
            return response()->json(['data' => $phoneDirectory,'message' => 'One PhoneDirectory retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No PhoneDirectory found']);
        }
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request,$id )
    {
        $request ->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'city' => 'required',
            'street' => 'required',
            'home_number' => 'required||numeric||digits_between:7,10',
            'mobile_number' => 'required||numeric||digits_between:10,14',
            'office_number' => 'required||numeric||digits_between:7,10',
            'profession' => 'required',
        ]);

        $phoneDirectory=PhoneDirectory::find($id);
        $phoneDirectory->first_name = $request->fname;
        $phoneDirectory->middle_name = $request->mname;
        $phoneDirectory->surname= $request->lname;
        $phoneDirectory->city= $request->city;
        $phoneDirectory->street = $request->street;
        $phoneDirectory->home_number = $request->home_number;
        $phoneDirectory->mobile_number = $request->mobile_number;
        $phoneDirectory->office_number = $request->office_number;
        $phoneDirectory->profession = $request->profession;
        $phoneDirectory->phone_category_id = $request->category;
        $phoneDirectory->save();

        return response()->json(['data' => $phoneDirectory,'message' => 'PhoneDirectory edited succesfully']);
    }

    public function destroy($id)
    {
        $phoneDirectory=PhoneDirectory::find($id);
        $phoneDirectory->delete();
        if ($phoneDirectory->count() > 0){
            return response()->json(['data' => $phoneDirectory,'message' => 'PhoneDirectory deleted succesfully']);
        }else{
            return response()->json(['message' => 'No PhoneDirectory found']);
        }
    }
}
