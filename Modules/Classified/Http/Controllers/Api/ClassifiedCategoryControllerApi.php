<?php

namespace Modules\Classified\Http\Controllers\api;

use Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Classified\Entities\ClassifiedCategory;

class ClassifiedCategoryControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index()
    {
        $categories=ClassifiedCategory::all();
        if (count($categories) > 0){
            return response()->json(['data' => $categories , 'message' => 'All categories retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No categories found']);
        }
    }

    public function create()
    {
        //
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

        return response()->json(['data' => $category ,'message' => 'Classified category created succesfully']);
    }

    public function edit($id)
    {
        $categories = ClassifiedCategory::find($id);
        if (count($categories) > 0){
            return response()->json(['data' => $categories , 'message' => 'One category retrieved succesfully']);
        }else{
            return response()->json(['message' => 'No categories found']);
        }
    }

    public function update(Request $request, $id)
    {
        $category = ClassifiedCategory::find($id);
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
        return response()->json(['data' => $category,'message' => 'Category updated succesfully']);
  }

    public function destroy($id)
    {
        $categories=ClassifiedCategory::find($id);
        $categories->delete();
        if (count($categories) > 0){
            return response()->json(['data' => $categories , 'message' => 'Category deleted succesfully']);
        }else{
            return response()->json(['message' => 'No categories found']);
        }
    }
}
