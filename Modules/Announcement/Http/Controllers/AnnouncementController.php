<?php

namespace Modules\Announcement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Announcement\Entities\Announcement;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('announcement::announcements.index')->with('announcements', Announcement::all());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('announcement::announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $announcement=Announcement::create([       //storing to database
            'title'=> $request->title,
            'details'=> $request->details,
            'published_at'=> $request->published_at,
            'published_till'=>$request->published_till
        ]);

        
        session()->flash('sucs','Announcement created successfully');

        return redirect(route('announcements.index'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $announcement = Announcement::find($id);
        return view('announcement::announcements.show')->with('announcement',$announcement);    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Announcement $announcement)
    {
        return view('announcement::announcements.create')->with('announcement',$announcement);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $announcement->title = $request->title;
        $announcement->details = $request->details;
        $announcement->published_at = $request->published_at;
        $announcement->published_till = $request->published_till;
        $announcement->save();

    session()->flash('sucs','Announcement is updated successfully');
    return redirect(route('announcements.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->forceDelete();
        session()->flash('err','Announcement deleted Successfully');
        return redirect(route('announcements.index'));  
    }
}
