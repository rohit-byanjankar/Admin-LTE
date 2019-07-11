<?php

namespace Modules\Home\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Announcement\Entities\Announcement;

class UserAnnouncementControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $announcements=Announcement::orderBy('created_at','desc')->paginate(5);
        $limannouncements=Announcement::orderBy('created_at','desc')->limit(4)->get();
        $data=['announcements' => $announcements , 'limited-announcement' => $limannouncements];
        if (count($announcements) > 0){
            return response()->json(['data' => $data , 'message'=> 'announcement retrieved succesfully']);
        }else{
            return response()->json(['message'=> 'No announcement found']);
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
        $announcement = Announcement::find($id);
        $limannouncements=Announcement::orderBy('created_at','desc')->limit(4)->get();
        $data = ['announcement' => $announcement , 'limited-announcement' =>$limannouncements];
        if (count($announcement) > 0){
            return response()->json(['data' => $data , 'message' => 'One announcement retrieved succesfully']);
        }else{
            return response()->json(['message'=> 'No announcement found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('home::edit');
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
