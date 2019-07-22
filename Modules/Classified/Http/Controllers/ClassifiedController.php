<?php

namespace Modules\Classified\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Classified\Entities\Classified;
use Helper;
use Illuminate\Support\Facades\Storage;
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
        return view('classified::classifiedAd.index')->with('classifieds', Classified::all())->with('categories', ClassifiedCategory::all());
    }


    public function create()
    {
        return view('classified::classifiedAd.create')->with('categories', ClassifiedCategory::all());
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
            'category_id' => $request->category,
            'price' => $request->price
        ]);

        if ($request->hasFile('image')) {
            $classified->image = Helper::uploadFile($destinationPath, $image); //using helper file
        }
        $classified->save();
        return redirect()->route('adminclassified.index')->with('sucs', 'Ad posted successfully');
    }

    public function verifyAd($id)
    {
        $classified = Classified::find($id);
        if ($classified->approved == 0) {
            $classified->approved = 1;
            $classified->update();
            session()->flash('sucs', 'Classified Ad Post is successfully approved.');
            return redirect(route('adminclassified.index'));
        }
    }

    public function show($id)
    {
        $classified = Classified::find($id);
        return view('classified::classifiedAd.show')->with('classified', $classified)->with('categories', ClassifiedCategory::all());
    }

    public function edit($id)
    {
        $classified = Classified::find($id);
        return view('classified::classifiedAd.create')->with('categories', ClassifiedCategory::all())->with('classified', $classified);
    }

    public function update(Request $request, $id)
    {
        $classified = Classified::find($id);
        if ($request->hasFile('image')) {
            $old_image = $classified->image;
            if (file_exists($old_image)) {
                unlink($old_image);
            }

            $image = $request->image;
            $destinationPath = 'uploads/';
            $classified->image = Helper::uploadFile($destinationPath, $image); //using helper file
            $classified->save(); //saving to database
        }

        //updating to database
        $classified->title = $request->title;
        $classified->description = $request->description;
        $classified->price = $request->price;
        $classified->save();

        session()->flash('sucs', 'The Ad is updated successfully');
        return redirect(route('adminclassified.index'));
    }

    public function destroy($id)
    {
        $classified = Classified::find($id);
        $old_image = $classified->image;
        if (file_exists($old_image)) {
            unlink($old_image);
        }
        $classified->delete();
        session()->flash('err', 'The Ad is deleted successfully');
        return redirect(route('adminclassified.index'));
    }
}
