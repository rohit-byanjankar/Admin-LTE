<?php

namespace Modules\Announcement\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller;
use Modules\Announcement\Entities\Announcement;

class AnnouncementControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $announcement=Announcement::all();
        $message=['Announcement' => 'Announcement retrieved succesfully'];
        return response()->json(['data' => $announcement,'message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'published_till' => 'required|date',
        ]);
        $announcement=Announcement::create([       //storing to database
            'title'=> $request->title,
            'details'=> $request->details,
            'published_till'=>$request->published_till
        ]);
        return response()->json(['data'=>$announcement,'message'=>'Announcement created succesfully']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $announcement = Announcement::find($id);
        return response()->json(['data' => $announcement,'message' => 'One Announcement retrieved succesfully']);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'published_till' => 'required|date',
        ]);
        $announcement=Announcement::find($id);
        $announcement->title = $request->title;
        $announcement->details = $request->details;
        $announcement->published_till = $request->published_till;
        $announcement->save();

        return response()->json(['data' => $announcement,'message' => 'Announcement updated succesfully']);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $announcement=Announcement::find($id);
        $announcement->forceDelete();

        return response(['data' => $announcement,'message' => 'Announcement deleted succesfully']);
    }
}
