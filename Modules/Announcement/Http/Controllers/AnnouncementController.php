<?php

namespace Modules\Announcement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Announcement\Entities\Announcement;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $announcements = Announcement::all();

        foreach ($announcements as $announcement) {
            if ($announcement->published_till < Carbon::now()) {
                Storage::disk('local')->append('archives/Old Announcement.txt', $announcement);
                $announcement->delete();
            }
        }
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
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'published_till' => 'required|date',
        ]);
        $announcement = Announcement::create([       //storing to database
            'title' => $request->title,
            'details' => $request->details,
            'published_till' => $request->published_till
        ]);
        session()->flash('sucs', 'Announcement created successfully');
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
        return view('announcement::announcements.show')->with('announcement', $announcement);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Announcement $announcement)
    {
        return view('announcement::announcements.create')->with('announcement', $announcement);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'published_till' => 'required|date',
        ]);
        $announcement->title = $request->title;
        $announcement->details = $request->details;

        $announcement->published_till = $request->published_till;
        $announcement->save();

        session()->flash('sucs', 'Announcement is updated successfully');
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
        session()->flash('err', 'Announcement deleted Successfully');
        return redirect(route('announcements.index'));
    }
}
