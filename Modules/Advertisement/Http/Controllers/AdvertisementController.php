<?php

namespace Modules\Advertisement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Advertisement\Entities\Advertisement;
use Helper;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('advertisement::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('advertisement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $image = $request->image;
        $destinationPath = 'uploads/'; 
        $advertisement=Advertisement::create([       //storing to database
            'title'=> $request->title,
            'description'=> $request->description,
            'content'=> $request->content, 
            'image'=> '-',
            'published_at'=> $request->published_at,
            
        ]);
        $advertisement->image = Helper::uploadFile($destinationPath, $image); //using helper file
        $advertisement->save();
        return redirect()->back()->with('success','Ad posted successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('advertisement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('advertisement::edit');
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
}
