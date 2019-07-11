<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Post;



class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('home::postCategories.index')->with('categories',Category::orderBy('name','asc')->paginate(9));
    }

    public function getCategory($Category_id)
    {
        $posts=Post::where("category_id",$Category_id)->paginate(5);
        return view('home::userposts.index',['posts' => $posts])->with('limposts',Post::orderBy('updated_at','desc')->limit(4)->get());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //
    }

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
