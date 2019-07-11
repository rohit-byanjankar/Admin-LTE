<?php

namespace Modules\Home\Http\Controllers;

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

       
        return view('classified::adCategory.userindex')->with('categories', ClassifiedCategory::all());
       
    }

    public function adminIndex()
    {
        return view('classified::adCategory.index')->with('adcategories', ClassifiedCategory::all());
    }


    public function create()
    {
        return view('classified::adCategory.create');
    }

    public function getCategory($Category_id)
    {
        $classifieds=Classified::where("category_id",$Category_id)->paginate(5);
        
            return view('home::classifiedAd.index',['classifieds' => $classifieds])->with('limclassifieds',Classified::orderBy('updated_at','desc')->limit(4)->get())->with('userclassifieds',Classified::all())->with('categories',ClassifiedCategory::all());
       
    }


    public function store(Request $request)
    {
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
        return redirect(route('adcategory.index'));
    }


    public function show($id)
    { }


    public function edit(ClassifiedCategory $category)
    {
        return view('classified::adcategory.create')->with('category', $category);
    }


    public function update(Request $request, ClassifiedCategory $category)
    {
        if (!$request->image == null) {
            $old_image = $category->image;
            if (!$old_image == null) {
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
        return redirect(route('adcategory.index'));
    }


    public function destroy(ClassifiedCategory $category)
    {
        $category->delete();

        session()->flash('err', 'Deleted Successfully');
        return redirect(route('adcategory.index'));
    }
}
