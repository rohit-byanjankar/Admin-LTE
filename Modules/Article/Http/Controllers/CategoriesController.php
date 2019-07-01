<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;

use Modules\Article\Entities\Category;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;
use App\Http\Controllers\Controller;
use Helper;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article::categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article::categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        //validation is done in app\request\createcategoryrequest in rule method 
        $image = $request->image;
        $destinationPath = 'uploads/';


        $category = Category::create([
            'name' => $request->name,
            'image' => '-',
        ]);
        if(!$request->image==null)
        {

            $category->image = Helper::uploadFile($destinationPath, $image); //using helper file
        }

        $category->save();
        session()->flash('sucs', 'Category added successfully');
        return redirect(route('categories.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('article::categories.create')->with('category', $category);
    }

    public function update(UpdateCategoriesRequest $request, Category $category)
    {


        if (!$request->image == null) {
            $old_image = $category->image;
            if(!$old_image==null)
            {
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
         }
         
         else{
             $category->name = $category->name;
         }


        $category->save();
        session()->flash('sucs', 'Category Updated Successfully');
        return redirect(route('categories.index'));
    }

    public function destroy(Category $category)
    {
        if ($category->posts->count() > 0) {
            session()->flash('err', 'There are posts associated with this category.');
            return redirect()->back();
        }
        $category->delete();

        session()->flash('err', 'Deleted Successfully');
        return redirect(route('categories.index'));
    }
}
