<?php

namespace Modules\Classified\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Classified\Entities\Classified;
use Helper;
use Illuminate\Support\Facades\Auth;
use Modules\Classified\Entities\ClassifiedCategory;

class ClassifiedController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('classified::classifiedAd.index')->with('classifieds', Classified::orderBy('created_at', 'desc')->paginate(5))->with('limclassifieds', Classified::orderBy('updated_at', 'desc')->limit(4)->get())->with('userclassifieds',Classified::all())->with('categories',ClassifiedCategory::all());
    }

  
    public function create()
    {
        return view('classified::classifiedAd.create')->with('categories',ClassifiedCategory::all());
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required||min:10||max:100'
        ]);

        $image = $request->image;
        $destinationPath = 'uploads/';
        $classified = Classified::create([       //storing to database
            'title' => $request->title,
            'description' => $request->description,
            'image' => '-',
            'user_id' => auth::user()->id,
            'category_id' => $request->category ,
            'price' => $request->price

        ]);
        $classified->image = Helper::uploadFile($destinationPath, $image); //using helper file
        $classified->save();
        return redirect()->route('classified.index')->with('success', 'Ad posted successfully');
    }

   
    public function show($id)
    {
        $classified = Classified::find($id);
        return view('classified::classifiedAd.show')->with('classified', $classified)->with('limclassifieds', Classified::orderBy('updated_at', 'desc')->limit(4)->get())->with('categories',ClassifiedCategory::all());
    }

   
    public function edit($id)
    {
        return view('classified::edit');
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
