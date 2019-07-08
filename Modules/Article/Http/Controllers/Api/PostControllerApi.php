<?php

namespace Modules\Article\Http\Controllers\Api;

use Helper;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Modules\Article\Entities\Post;
use Auth;

class PostControllerApi extends Controller
{
    public function index()
    {
        $post=Post::all();
        return response()->json(['data' => $post,'message' => 'Post retrieved succesfully']);
    }

    public function create()
    {

    }

    public function store(CreatePostsRequest $request)
    {
        $image = $request->image;
        $destinationPath = 'uploads/';
        $contents = strip_tags($request->content);
        $post = Post::create([       //storing to database
            'title' => $request->title,
            'description' => $request->description,
            'content' => $contents,
            'image' => '-',
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth::user()->id,
        ]);

        $post->image = Helper::uploadFile($destinationPath, $image); //using helper file
        $post->save();

        if ($request->tags)  //attaching tag
        {
            $post->tags()->attach($request->tags);
        }
        return response()->json(['data' => $post,'message' => 'Post created succesfully']);
    }


    public function show($id)
    {
        $post=Post::find($id);
        return response()->json(['data' => $post,'message' => 'One Post retrieved succesfully']);
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post=Post::find($id);
        if ($request->hasFile('image')) {
            $old_image = $post->image;
            unlink($old_image);
            $image = $request->image;
            $destinationPath = 'uploads/';
            $post->image = Helper::uploadFile($destinationPath, $image); //using helper file
            $post->save(); //saving to database
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        //updating to database
        $post->title = $request->title;
        $post->description = $request->description;
        $contents = strip_tags($request->content);
        $post->content = $contents;
        $post->published_at = $request->published_at;
        $post->save();

        return response()->json(['data' => $post,'message' => 'Post updated succesfully']);
    }

    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();

        return response()->json(['data' => $post,'message' => 'Post deleted succesfully']);
    }
    
}

