<?php

namespace Modules\Advertisement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Advertisement\Entities\Advertisement;
use Helper;
use Illuminate\Support\Facades\Auth;
use Modules\Advertisement\Entities\Category;
use Modules\Advertisement\Entities\AdCategory;

class AdvertisementCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

       
        return view('advertisement::adCategory.userindex')->with('categories', AdCategory::all());
       
    }

    public function adminIndex()
    {
        return view('advertisement::adCategory.index')->with('adcategories', AdCategory::all());
    }


    public function create()
    {
        return view('advertisement::adCategory.create');
    }

    public function getCategory($Category_id)
    {
        $advertisements=Advertisement::where("category_id",$Category_id)->paginate(5);
        
            return view('advertisement::classifiedAd.index',['advertisements' => $advertisements])->with('limadvertisements',Advertisement::orderBy('updated_at','desc')->limit(4)->get())->with('useradvertisements',Advertisement::all());
       
    }


    public function store(Request $request)
    {
        $image = $request->image;
        $destinationPath = 'uploads/';


        $category = AdCategory::create([
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


    public function edit(AdCategory $category)
    {
        return view('advertisement::adcategory.create')->with('category', $category);
    }


    public function update(Request $request, AdCategory $category)
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


    public function destroy(AdCategory $category)
    {
        $category->delete();

        session()->flash('err', 'Deleted Successfully');
        return redirect(route('adcategory.index'));
    }
}
