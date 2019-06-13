<?php

namespace Modules\TelephoneDirectory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\TelephoneDirectory\Entities\PhoneDirectory;

class TelephoneDirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('telephonedirectory::directory.index')->with('phoneDirectory',PhoneDirectory::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('telephonedirectory::directory.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        PhoneDirectory::create([       //storing to database
            'first_name'=> $request->fname,
            'middle_name'=> $request->mname,
            'surname'=> $request->lname,
            'city'=> $request->city,
            'street' => $request->street,
            'home_number' => $request->hnumber,
            'mobile_number' => $request->mnumber,
            'office_number' => $request->onumber,
            'profession' => $request->profession,
        ]);

        session()->flash('sucs','Directory Created Succesfully');
        return redirect(route('directory.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $phoneDirectory=PhoneDirectory::find($id);
        return view('telephonedirectory::directory.create',compact('phoneDirectory'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
            //update to database
        $phoneDirectory=PhoneDirectory::find($id);
        $phoneDirectory->first_name = $request->fname;
        $phoneDirectory->middle_name = $request->mname;
        $phoneDirectory->surname= $request->lname;
        $phoneDirectory->city= $request->city;
        $phoneDirectory->street = $request->street;
        $phoneDirectory->home_number = $request->hnumber;
        $phoneDirectory->mobile_number = $request->mnumber;
        $phoneDirectory->office_number = $request->onumber;
        $phoneDirectory->profession = $request->profession;
        $phoneDirectory->save();

        session()->flash('sucs','Directory Updated Succesfully');
        return redirect(route('directory.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $phoneDirectory=PhoneDirectory::find($id);
        $phoneDirectory->delete();

        session()->flash('sucs','Directory Deleted Succesfully');
        return redirect(route('directory.index'));
    }
}
