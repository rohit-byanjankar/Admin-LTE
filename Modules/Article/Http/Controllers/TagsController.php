<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article::tags.index')->with('tags',Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article::tags.create');
    }

    public function store(CreateTagRequest $request)
    {
          //validation is done in app\request\createTagrequest in rule method
          Tag::create([  //Tag is model(table) and create is a function provided by model class 
            'name'=> $request->name  // the first name is column in database and second name is form name
          ]);
          session()-> flash('sucs','Tag added successfully');
          return redirect(route('tags.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('article::tags.create')-> with('tag', $tag);
    }


    public function update(UpdateTagRequest $request, Tag $tag )
    {
        $tag->update([
            'name'=> $request->name
        ]);
        $tag->save();

        session()-> flash('sucs','Tag Updated Successfully');
        return redirect(route('tags.index'));
    }

    public function destroy(Tag $tag)
    {
        if($tag->posts->count()>0)
        {
            session()-> flash('err', 'There are posts associated with this tag.');
            return redirect()->back();

        }
        $tag->delete();
        session()-> flash('sucs', 'Deleted Successfully');
        return redirect(route('tags.index'));
    }
}
