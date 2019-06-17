<?php

namespace Modules\TelephoneDirectory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\TelephoneDirectory\Entities\PhoneCategory;

class TelephoneCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('telephonedirectory::category.index')->with('categories', PhoneCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('telephonedirectory::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //validation is done in app\request\createcategoryrequest in rule method 
        PhoneCategory::create([  //Category is model(table) and create is a function provided by model class 
            'name'=> $request->name  // the first name is column in database and second name is form name
          ]);
          session()-> flash('sucs','Category added successfully');
          return redirect(route('category.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('telephonedirectory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $phoneCategory=PhoneCategory::find($id);
        return view('telephonedirectory::category.create')-> with('category',$phoneCategory);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $phoneCategory=PhoneCategory::find($id);
       //validation is done in app\request\createcategoryrequest in rule method 
       $phoneCategory->update([  //Category is model(table) and create is a function provided by model class 
        'name'=> $request->name  // the first name is column in database and second name is form name
      ]);
      $phoneCategory->save();
      session()-> flash('sucs','Category updated successfully');
      return redirect(route('category.index')); 
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $phoneCategory=PhoneCategory::find($id);
        $phoneCategory->delete();
        session()-> flash('err','Category deleted successfully');
      return redirect(route('category.index'));
    }
}
