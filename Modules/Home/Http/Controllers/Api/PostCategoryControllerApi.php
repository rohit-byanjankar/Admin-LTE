<?php

namespace Modules\Home\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Post;

class PostCategoryControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories=Category::orderBy('name','asc')->paginate(9);
        if (count($categories) > 0){
            return response()->json(['data' => $categories , 'message' => 'Category retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No Categories found']);
        }
    }

    public function getCategory($Category_id)
    {
        $posts=Post::where("category_id",$Category_id)->paginate(5);
        $limposts=Post::orderBy('updated_at','desc')->limit(4)->get();
        $data = ['posts' => $posts , 'limit-post' => $limposts];
        if (count($posts) > 0){
            return response()->json(['data' => $data, 'message' => 'Post displayed succesfully']);
        }else{
            return response()->json(['message' => 'No post found']);
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
