<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Tag;
use Auth;

class PostsController extends Controller
{
    public function __construct()
    {   
        $this->middleware('verifyCategoryCount')->only(['create','store']);
        
    }
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    
    public function store(CreatePostsRequest $request)
    {
        // $image= $request->image->store('uploads/'); //storing image to storage
        
        $image = $request->image;
       $image_name  =  Storage::disk('public')->put('/uploads', $image); //storing image to storage

       $contents = strip_tags($request->content);
        $post=Post::create([       //storing to database
            'title'=> $request->title,
            'description'=> $request->description,
            'content'=> $contents, 
            'image'=>   $image_name,
            'published_at'=> $request->published_at,
            'category_id'=> $request->category,
            'user_id' => auth::user()->id,
        ]);

        if($request->tags)  //attaching tag 
        {
            $post->tags()->attach($request->tags);
        }
        session()->flash('sucs','Post Created Successfully');
        return redirect(route('posts.index'));
    }

    public function show(Post $post)
    {
        return view('posts.show')->with('post' ,$post);
    }

    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if($request->hasFile('image')){
            $old_image = $post->image;   //deleting old file from folder 
            unlink(public_path($old_image));           //old image gives uploads/filename
            $image = $request->image;
             $image_name  =  Storage::disk('public')->put('/uploads', $image); //storing image to storage
             $post->image = $image_name;
             $post->save(); //saving to database
        }

            if($request->tags)
            {
                $post->tags()->sync($request->tags);
            }

              //updating to database
            $post->title = $request->title;
            $post->description = $request->description;
            $contents = strip_tags($request->content);
            $post->content = $contents;
            $post->published_at = $request->published_at;
            $post->save();
    
        session()->flash('sucs','Post is updated successfully');

        return redirect(route('posts.index'));
    }


    public function destroy($id)
    {
         $post= Post::withTrashed()->where('id', $id)->firstOrFail();

            if($post->trashed())
            {
                Storage::delete($post->image);
                $post->forceDelete();
                return redirect(route('trashed-posts.index'));
            }
            else{
                $post->delete();
                return redirect(route('posts.index'));
            }
            session()->flash('sucs','Post deleted Successfully');
     }

    public function trashed() //display a list of all trashed posts
    {
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->withposts($trashed); //same as with('posts',$trashed)    
    }

    public function restore($id)
    {
        $post= Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        session()->flash('sucs','Post Restored Successfully.');
        return redirect()->back();
    }
}

