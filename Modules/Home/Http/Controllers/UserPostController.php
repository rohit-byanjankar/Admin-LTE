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
use Illuminate\Support\Facades\DB;


class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        
        return view('home::userposts.index')->with('posts',Post::orderBy('published_at','desc')->paginate(5))->with('categories',Category::all())->with('limposts',Post::orderBy('updated_at','desc')->limit(4)->get());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('home::userposts.create')->with('categories',Category::all())->with('posts',Post::all())->with('tags',Tag::all());
    }


    public function store(CreatePostsRequest $request)
    {
        $image = $request->image;
        $image_name  =  Storage::disk('public')->put('/uploads', $image); //storing image to storage
         $post=Post::create([       //storing to database
             'title'=> $request->title,
             'description'=> $request->description,
             'content' => $request->content, 
             'image'=>   $image_name,
             'category_id'=> $request->category,
             'user_id' => auth::user()->id,
         ]);
 
         if($request->tags)  //attaching tag 
         {
             $post->tags()->attach($request->tags);
         }
 
         session()->flash('sucs','Post Created Successfully');
 
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
        return view('home::userposts.show')->with('post',$post)->with('tags',Tag::find($id))->with('limposts',Post::orderBy('updated_at','desc')->limit(4)->get());
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

    public function userHome()
    {
        return view('home::index');
    }
}
