<?php

namespace Modules\Home\Http\Controllers\api;

use App\Http\Requests\Posts\CreatePostsRequest;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Post;
use Modules\Article\Entities\Tag;

class UserPostControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $posts=Post::orderBy('published_at','desc')->paginate(5);
        $categories=Category::all();
        $limposts=Post::orderBy('updated_at','desc')->limit(4)->get();
        $data = ['All Post' => $posts , 'All Category' =>$categories , 'Limited-Post' => $limposts];
        if (count($posts) > 0){
            return response()->json(['data' => $data , 'message' => 'Post retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No Post found']);
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


    public function store(CreatePostsRequest $request)
    {
        $image = $request->image;
        $destinationPath = 'uploads/';
        $contents = strip_tags($request->content);
        $post=Post::create([       //storing to database
            'title'=> $request->title,
            'description'=> $request->description,
            'content'=> $contents,
            'image'=> '-',
            'published_at'=> $request->published_at,
            'category_id'=> $request->category,
            'user_id' => auth::user()->id,
        ]);

        $post->image = Helper::uploadFile($destinationPath, $image); //using helper file
        $post->save();
        if($request->tags)  //attaching tag
        {
            $post->tags()->attach($request->tags);
        }

       return response()->json(['message' => 'Post created succesfully']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        $tags=Tag::find($id);
        $limposts=Post::orderBy('updated_at','desc')->limit(4)->get();
        $data = ['Post' => $posts ,'Tag' => $tags, 'limited-Post' =>$limposts];
        if (count($posts) > 0){
            return response()->json(['data' => $data , 'message' => 'One Post retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No Post found']);
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
