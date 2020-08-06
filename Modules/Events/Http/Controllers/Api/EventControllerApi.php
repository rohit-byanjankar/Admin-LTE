<?php

namespace Modules\Events\Http\Controllers\Api;

use Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Events\Entities\Event;

class EventControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if(isset($request->start)){
            return $this->getEvents($request);
        }

        $event=Event::paginate();
        if (count($event) > 0){
            return response()->json(['data' => $event ,'message' => 'Events retrieved succesfully'],200);
        }else {
            return response()->json(['message' => 'No Events found'],201);
        }
    }

    /**
     * Display a listing of the resource from start to end date
     * @return Response
     */
    public function getEvents(Request $request){
        $start=$request->start;
        $end=$request->end;
         $event=Event::whereBetween("event_date",array($start,$end))->get();
        if (count($event) > 0){
            return response()->json(['data' => $event ,'message' => 'Events retrieved succesfully'],200);
        }else {
            return response()->json(['message' => 'No Events found'],201);
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
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'description' => 'required',
            'venue' => 'required',
            'event_date' => 'required|date',
            'duration' => 'required|numeric',
            'image' => 'required',
        ]);
        $event= Event::create([
            //storing to database
            'title' => $request->title,
            'details' => $request->details,
            'description' => $request->description,
            'venue' => $request->venue,
            'event_date' => $request->event_date,
            'duration' => $request->duration,
            'image' => '-'
        ]);
        $image = $request->image;
        $destinationPath = 'uploads/';

        $event->image = Helper::uploadFile($destinationPath, $image); //using helper file
        $event->save();

        if ($event){
            return response()->json(['data' => $event ,'message' => 'Event stored succesfully']);
        }else {
            return response()->json(['message' => 'No Events found']);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $event=Event::find($id);
        if ($event->count() > 0){
            return response()->json(['data' => $event ,'message' => 'One Event retrieved succesfully']);
        }else {
            return response()->json(['message' => 'No Event found']);
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
        $event=Event::find($id);
        $event->title = $request->title;
        $event->details = $request->details;
        $event->venue = $request->venue;
        $event->event_date = $request->event_date;
        $event->duration = $request->duration;
        $event->published_at = $request->published_at;
        if (!$request->image == null) {
            $old_image = $event->image;
            if(!$old_image==null)
            {
                unlink($old_image);
            }
            $image = $request->image;
            $destinationPath = 'uploads/';

            $event->image = Helper::uploadFile($destinationPath, $image); //using helper file
        } else {

            $event->image = $event->image;
        }
        $event->save();

        if ($event){
            return response()->json(['data' => $event ,'message' => 'Events updated succesfully']);
        }else {
            return response()->json(['message' => 'No Event found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $event=Event::find($id);
        if ($event->count() > 0){
        $event->delete();
            return response()->json(['data' => $event ,'message' => 'Events deleted succesfully']);
        }else {
            return response()->json(['message' => 'No Events found']);
        }
    }
}
