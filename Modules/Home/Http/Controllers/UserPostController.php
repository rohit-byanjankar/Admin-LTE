<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Post;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Tag;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Auth;
use Helper;
use Illuminate\Support\Facades\DB;


class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.   
     * @return Response
     */
    public function index()
    {

        return view('home::userposts.index')->with('posts', Post::orderBy('published_at', 'desc')->paginate(5))->with('categories', Category::all())->with('limposts', Post::orderBy('updated_at', 'desc')->limit(4)->get());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('home::userposts.create')->with('categories', Category::all())->with('posts', Post::all())->with('tags', Tag::all());
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
        session()->flash('sucs', 'Post Created Successfully');
        return redirect(route('userposts.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('home::userposts.show')->with('post', $post)->with('tags', Tag::find($id))->with('limposts', Post::orderBy('updated_at', 'desc')->limit(4)->get());
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('home::userposts.create')->with('categories', Category::all())->with('tags', Tag::all())->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
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

        session()->flash('success', 'Post is updated successfully');
        return redirect(route('userposts.index'));
    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $old_image = $post->image;
        if (file_exists($old_image)) {
            unlink($old_image);
        }
        $post->forceDelete();
        session()->flash('success', 'Your Article is deleted successfully');
        return redirect(route('userposts.index'));
    }

  /*  public function userHome()
    {
        return view('home::index');
    }*/
}
