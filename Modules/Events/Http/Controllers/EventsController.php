<?php


namespace Modules\Events\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Symfony\Contracts\EventDispatcher\Event as SymfonyEvent;
use Modules\Events\Entities\Event;
use Helper;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$events=new Event;
        //$events->setConnection('mysql2');
        $events = Event::all();
        //return view('events::events.index')->with('events',Event::all());
        return view('events::events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events::events.create')->with('events', Event::all());
    }


    public function store(Request $request)
    {
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

        session()->flash('sucs', 'Event Created Successfully');

        return redirect(route('events.index'));
    }


    public function show(Event $event)
    {
        return view('events::events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events::events.create')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
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

        session()->flash('sucs', 'Event is updated successfully');

        return redirect(route('events.index'));
    }


    public function destroy($id)
    {
        $event = Event::where('id', $id);
        $event->delete();
        return redirect(route('events.index'));
        session()->flash('err', 'Event deleted Successfully');
    }
}
