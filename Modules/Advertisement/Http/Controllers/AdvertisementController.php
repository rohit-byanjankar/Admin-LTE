<?php

namespace Modules\Advertisement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Advertisement\Entities\Advertisement;
use Helper;
use Illuminate\Support\Facades\Auth;
use Modules\Advertisement\Entities\AdCategory;

class AdvertisementController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      
        return view('advertisement::classifiedAd.index')->with('advertisements', Advertisement::orderBy('created_at', 'desc')->paginate(5))->with('limadvertisements', Advertisement::orderBy('updated_at', 'desc')->limit(4)->get())->with('useradvertisements',Advertisement::all());
    }

  
    public function create()
    {
        return view('advertisement::classifiedAd.create')->with('categories',AdCategory::all());
    }

   
    public function store(Request $request)
    {
        $image = $request->image;
        $destinationPath = 'uploads/';
        $advertisement = Advertisement::create([       //storing to database
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => '-',
            'published_at' => $request->published_at,
            'user_id' => auth::user()->id,
            'category_id' => $request->category 

        ]);
        $advertisement->image = Helper::uploadFile($destinationPath, $image); //using helper file
        $advertisement->save();
        return redirect()->back()->with('success', 'Ad posted successfully');
    }

   
    public function show($id)
    {
        $advertisement = Advertisement::find($id);
        return view('advertisement::classifiedAd.show')->with('advertisement', $advertisement)->with('limadvertisements', Advertisement::orderBy('updated_at', 'desc')->limit(4)->get());;
    }

   
    public function edit($id)
    {
        return view('advertisement::edit');
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
