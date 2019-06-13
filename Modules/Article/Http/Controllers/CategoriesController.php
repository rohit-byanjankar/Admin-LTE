<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article::categories.index')->with('categories',Category::all());
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
          Category::create([  //Category is model(table) and create is a function provided by model class 
            'name'=> $request->name  // the first name is column in database and second name is form name
          ]);

          session()-> flash('success','Category added successfully');

          return redirect(route('categories.index'));
    }

    
    public function show($id)
    {
        //
    }

   

    public function edit(Category $category)
    {
        //
        return view('article::categories.create')-> with('category', $category);
    }

    


    public function update(UpdateCategoriesRequest $request, Category $category )
    {
        $category->update([
            'name'=> $request->name
        ]);

        $category->save();

        session()-> flash('success','Category Updated Successfully');
        return redirect(route('categories.index'));
    }

   
    public function destroy(Category $category)
    {
        if($category->posts->count()>0)
        {
            session()-> flash('err', 'There are posts associated with this category.');
            return redirect()->back();
        }
        $category->delete();

        session()-> flash('success', 'Deleted Successfully');

        return redirect(route('categories.index'));
    }
}
