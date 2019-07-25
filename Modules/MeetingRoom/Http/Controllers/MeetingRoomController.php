<?php

namespace Modules\MeetingRoom\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MeetingRoom\Entities\MeetingRoom;

class MeetingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $meetings = MeetingRoom::all();
        return view('meetingroom::meeting.index', compact('meetings'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('meetingroom::meeting.create');
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
            'agenda' => 'required',
            'time' => 'required',
        ]);
        $meeting = MeetingRoom::create([
            //storing to database
            'title' => $request->title,
            'agenda' => $request->agenda,
            'time' => $request->time,
        ]);
        session()->flash('sucs', 'Meeting Created Successfully');
        return redirect(route('meeting.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(MeetingRoom $meeting)
    {
        return view('meetingroom::meeting.show')->with('meeting', $meeting);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(MeetingRoom $meeting)
    {
        return view('meetingroom::meeting.create')->with('meeting', $meeting);

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request,MeetingRoom $meeting)
    {
        $request->validate([
            'title' => 'required',
            'agenda' => 'required',
            'time' => 'required|date',
        ]);
        $meeting->title = $request->title;
        $meeting->time = $request->time;
        $meeting->agenda = $request->agenda;

        $meeting->save();
        session()->flash('sucs', 'Meeting updated successfully');
        return redirect(route('meeting.index'));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $meeting=MeetingRoom::find($id);
        $meeting->delete();
        session()->flash('err', 'Meeting deleted successfully');
        return redirect(route('meeting.index'));
    }
}
