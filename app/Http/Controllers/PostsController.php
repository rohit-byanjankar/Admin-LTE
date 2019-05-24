<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    
    public function create()
    {
        return view('posts.create');
    }

    
    public function store(CreatePostsRequest $request)
    {
        $image= $request->image->store('posts'); //storing image to storage
        
        Post::create([       //storing to database
            'title'=> $request->title,
            'description'=> $request->description,
            'content'=> $request->content,
            'image'=> $image
        ]);

        session()->flash('success','Post Created Successfully');

        return redirect(route('posts.index'));
    }

   
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
