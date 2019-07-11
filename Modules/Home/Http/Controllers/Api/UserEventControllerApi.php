<?php

namespace Modules\Home\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Events\Entities\Event;

class UserEventControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $events=Event::orderBy('event_date')->paginate(5);
        $limevents=Event::orderBy('event_date','asc')->limit(4)->get();
        $data = ['event' => $events , 'limited-event' =>$limevents];
        if (count($events) > 0){
              return response()->json(['data' => $data , 'message' => 'Event retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No Events found']);
        }
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
        $events = Event::find($id);
        $limevents=Event::orderBy('event_date','asc')->limit(4)->get();
        $data = ['event' => $events , 'limited-event' =>$limevents];
        if (count($events) > 0){
            return response()->json(['data' => $data , 'message' => 'One Event retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No Events found']);
        }
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
