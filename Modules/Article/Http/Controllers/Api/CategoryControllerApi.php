<?php


namespace Modules\Article\Http\Controllers\Api;


use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;
use Helper;
use Modules\Article\Entities\Category;

class CategoryControllerApi
{
    public function index()
    {
        $category=Category::all();
        if (count($category) > 0){
            return response()->json(['data' => $category,'message ' => 'Category retrieved succesfully'],200);
        }else{
            return response()->json(['message ' => 'No category found'],201);
        }
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

        if ($category){
            return response()->json(['data' => $category,'message ' => 'Category created succesfully']);
        }else{
            return response()->json(['message ' => 'No category found']);
        }
    }

    public function show($id)
    {
        $category=Category::find($id);
        if ($category->count() > 0){
            return response()->json(['data' => $category,'message ' => 'One Category retrieved succesfully']);
        }else{
            return response()->json(['message ' => 'No category found']);
        }
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(UpdateCategoriesRequest $request,$id)
    {
        $category=Category::find($id);
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
        if ($category){
            return response()->json(['data' => $category,'message ' => 'Category updated succesfully']);
        }else{
            return response()->json(['message ' => 'No category found']);
        }
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        if ($category->posts->count() > 0) {
            session()->flash('err', 'There are posts associated with this category.');
            return response()->json(['message' => 'Category associated with post']);
        }
        $category->delete();
        if ($category->count() > 0){
            return response()->json(['data' => $category,'message ' => 'Category deleted succesfully']);
        }else{
            return response()->json(['message ' => 'No category found']);
        }
    }
}