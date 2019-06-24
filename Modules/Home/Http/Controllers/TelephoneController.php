<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\TelephoneDirectory\Entities\PhoneDirectory;
use Modules\TelephoneDirectory\Entities\PhoneCategory;

class TelephoneController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories=PhoneCategory::all();
        $i=0;
        $contacts=PhoneDirectory::all();
        $groupedContacts=array();
        foreach($categories as $category){
            if(!isset($groupedContacts[$category->name])){
                $groupedContacts[$category->name]=[];
            }
            if(!isset($groupedContacts[$category->name]["id"])){
                $groupedContacts[$category->name]["id"]=$category->id;
            }

            if(!isset($groupedContacts[$category->name]["list"])){
                $groupedContacts[$category->name]["list"]=[];
            }
          
            foreach($contacts as $contact){
                
                if($contact->phone_category_id==$category->id){
                   
                    array_push($groupedContacts[$category->name]["list"],$contact);
                }
            }
            $i++;
        }
        return view('home::telephonedir.index',compact("categories","groupedContacts"));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('home::telephonedir.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('home::telephonedir.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('home::telephonedir.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function telephoneCategory(Request $request,$cat)
    {

        $msg = PhoneDirectory::find($cat);
        return response()->json(array('msg'=> $msg), 200);
    }
}
