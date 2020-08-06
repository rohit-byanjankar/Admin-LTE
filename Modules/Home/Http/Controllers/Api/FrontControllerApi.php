<?php

namespace Modules\Home\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Article\Entities\Post;
use Modules\Announcement\Entities\Announcement;
use Modules\Classified\Entities\Classified;
use Modules\Events\Entities\Event;
class FrontControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //returns posts, announcementments and classifieds
        $posts=Post::orderBy('updated_at','desc')->with('user','category')->limit(5)->get();
        $announcements=Announcement::orderBy('updated_at','desc')->limit(5)->get();
        $classifieds=Classified::orderBy('updated_at','desc')->with('user')->limit(5)->get();
        $events=Event::orderBy('updated_at','desc')->limit(3)->get();

        return response()->json(['posts' => $posts,'announcements'=>$announcements,'classifieds'=>$classifieds,'events'=>$events]);
    }

    public function account()
    {
        $user=Auth::user();
        if ($user){
            return response()->json(['data' => $user , 'message' => 'Current logged in user\'s data retrieved succesfully']);
        }else{
            return response()->json(['message' => 'User not logged in ']);
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
        //
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
