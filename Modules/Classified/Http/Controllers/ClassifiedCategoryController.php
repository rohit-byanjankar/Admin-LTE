<?php

namespace Modules\Classified\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Classified\Entities\Classified;
use Helper;
use Illuminate\Support\Facades\Auth;
use Modules\Classified\Entities\Category;
use Modules\Classified\Entities\ClassifiedCategory;

class ClassifiedCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('classified::adcategory.index')->with('categories', ClassifiedCategory::all());
    }

    public function create()
    {
        return view('classified::adcategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|size:2048',
            'name' => 'required'
        ]);
        $image = $request->image;
        $destinationPath = 'uploads/';

        $category = ClassifiedCategory::create([
            'name' => $request->name,
            'image' => '-',
        ]);
        if (!$request->image == null) {
            $category->image = Helper::uploadFile($destinationPath, $image); //using helper file
        }

        $category->save();
        session()->flash('sucs', 'Category added successfully');
        return redirect(route('adminclassifiedcategory.index'));
    }

    public function edit($id)
    {
        $category = ClassifiedCategory::find($id);
        return view('classified::adcategory.create')->with('category', $category);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|size:2048',
            'name' => 'required'
        ]);
        $category = ClassifiedCategory::find($id);
        if (!$request->image == null) {
            $old_image = $category->image;
            if (file_exists($old_image)) {
                unlink($old_image);
            }

            $image = $request->image;
            $destinationPath = 'uploads/';

            $category->image = Helper::uploadFile($destinationPath, $image); //using helper file
        } else {
            $category->image = $category->image;
        }

        if (!$request->name == null) {
            $category->name = $request->name;
        } else {
            $category->name = $category->name;
        }

        $category->save();
        session()->flash('sucs', 'Category Updated Successfully');
        return redirect(route('adminclassifiedcategory.index'));
    }

    public function destroy($id)
    {
        $category=ClassifiedCategory::find($id);
        $old_image = $category->image;
        if (file_exists($old_image)) {
            unlink($old_image);
        }
        $category->delete();

        session()->flash('err', 'Deleted Successfully');
        return redirect(route('adminclassifiedcategory.index'));
    }
}
