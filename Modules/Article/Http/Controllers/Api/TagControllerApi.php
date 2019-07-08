<?php


namespace Modules\Article\Http\Controllers\Api;


use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use Modules\Article\Entities\Tag;

class TagControllerApi
{
    public function index()
    {
        $tag=Tag::all();
        return response()->json(['data' => $tag,'message' => 'Tag retrieved succesfully']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(CreateTagRequest $request)
    {
        //validation is done in app\request\createTagrequest in rule method
        $tag=Tag::create([  //Tag is model(table) and create is a function provided by model class
            'name'=> $request->name  // the first name is column in database and second name is form name
        ]);
        return response()->json(['data' => $tag,'message' => 'Tag created succesfully']);
    }

    public function show($id)
    {
        $tag=Tag::find($id);
        return response()->json(['data' => $tag,'message' => 'One Tag retrieved succesfully']);
    }

    public function edit($id)
    {
       //
    }


    public function update(UpdateTagRequest $request,$id )
    {
        $tag=Tag::find($id);
        $tag->update([
            'name'=> $request->name
        ]);
        $tag->save();

        return response()->json(['data' => $tag,'message' => 'Tag edited succesfully']);
    }

    public function destroy($id)
    {
        $tag=Tag::find($id);
        if($tag->posts->count()>0)
        {
            session()-> flash('err', 'There are posts associated with this tag.');
            return response()->json(['message' => 'Tag associated with post']);

        }
        $tag->delete();
        return response()->json(['data' => $tag,'message' => 'Tag destroyed succesfully']);
    }
}