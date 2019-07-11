<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Post;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index()
    {
        return view('home::index')->with('posts',Post::orderBy('updated_at','desc')->paginate(5));
    }

    public function account()
    {
        return view('home::UserProfile.account')->with('user',Auth::user());
    }

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
