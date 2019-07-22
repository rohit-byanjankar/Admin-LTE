<?php

namespace Modules\Article\Http\Controllers;

use Modules\UserRoles\Entities\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Modules\Article\Entities\Post;
use Illuminate\Support\Facades\Storage;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Tag;
use Auth;
use Helper;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoryCount')->only(['create', 'store']);
    }

    public function index()
    {
        return view('article::posts.index')->with('posts', Post::all());
    }

    public function create()
    {
        return view('article::posts.create')->with('categories', Category::all())->with('tags', Tag::all());
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

        return redirect(route('posts.index'));
    }

    public function show(Post $post)
    {
        return view('article::posts.show')->with('post', $post);
    }

    public function edit(Post $post)
    {

        return view('article::posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
            $old_image = $post->image;
            if (file_exists($old_image)) {
                unlink($old_image);
            }

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

        session()->flash('sucs', 'Post is updated successfully');
        return redirect(route('posts.index'));
    }

    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        if ($post->trashed()) {
            $old_image = $post->image;
            if (file_exists($old_image)) {
                unlink($old_image);
            }
            $post->forceDelete();
            return redirect(route('trashed-posts.index'));
        } else {
            $post->delete();
            return redirect(route('posts.index'));
        }
        session()->flash('sucs', 'Post deleted Successfully');
    }

    public function trashed() //display a list of all trashed posts
    {
        $trashed = Post::onlyTrashed()->get();
        return view('article::posts.index')->withposts($trashed); //same as with('posts',$trashed)
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        session()->flash('err', 'Post Restored Successfully.');
        return redirect()->back();
    }
}
