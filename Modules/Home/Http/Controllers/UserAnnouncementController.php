<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Announcement\Entities\Announcement;
use Illuminate\Support\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Support\Facades\Storage;

class UserAnnouncementController extends Controller
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
                Storage::disk('local')->update('archives/Old Announcement.txt', $announcement);
            }
        }

        return view('home::announcements.index')->with('announcements', Announcement::orderBy('created_at', 'desc')->paginate(5))->with('limannouncements', Announcement::orderBy('created_at', 'desc')->limit(4)->get());
    }

    public function pindex()
    {
        $announcements = Announcement::orderBy('published_till', 'asc')->where('published_till', '>', carbon::now())->paginate(5);
        return view('home::announcements.pindex', compact('announcements'));
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
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $announcemt = Announcement::find($id);
        return view('home::announcements.show')->with('announcement', $announcemt)->with('limannouncements', Announcement::orderBy('created_at', 'desc')->limit(4)->get());
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
