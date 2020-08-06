<?php

namespace Modules\Classified\Http\Controllers\api;

use Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Classified\Entities\Classified;
use Modules\Classified\Entities\ClassifiedCategory;

class ClassifiedControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $query=Classified::with('user');
        if(isset($request->category_id)){
        	$query->where('adcategories_id',$request->category_id);
        }
        $classifieds=$query->paginate($request->per_page);
        $categories=ClassifiedCategory::get();
        $data = ['ads' => $classifieds , 'ad_category' => $categories];
        if (count($classifieds) > 0){
             return response()->json(['data' => $data,'message' => 'All Ads retrieved succesfully',200]);
        }else{
        	$data = ['ads' => [] , 'ad_category' => $categories];
            return response()->json(['data'=>$data, 'message' => 'No Ads found'],201);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $image = $request->image;
        $destinationPath = 'uploads/';
        $classified = Classified::create([       //storing to database
            'title' => $request->title,
            'description' => $request->description,
            'image' => '-',
            'user_id' => $request->user_id,
            'adcategories_id' => $request->category_id,
            'price' => $request->price
        ]);
        if($image!=null){
        $classified->image = Helper::uploadFile($destinationPath, $image); //using helper file
        }
        $classified->save();
        return response()->json(['data' => $classified , 'message' =>'Ad stored succesfully']);
    }

    public function verifyAd($id)
    {
        $classified = Classified::find($id);
        if($classified->approved == 0)
        {
            $classified->approved = 1;
            $classified->update();
            if ($classified->count() > 0){
                return response()->json(['message' => 'Ad  verified succesfully']);
            }else{
                return response()->json(['message' => 'No Ads found']);
            }
        }
    }

    public function show($id)
    {
        $classified = Classified::where('id',$id)->with('user','classifiedCategory')->first();
        $categories=ClassifiedCategory::all();
        $data = ['Ad' => $classified , 'ad_category' => $categories];
        if ($classified){
            return response()->json(['data' => $data,'message' => 'One Ad retrieved succesfully'],200);
        }else{
            return response()->json(['message' => 'No Ads found'],201);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $classified = Classified::find($id);
        if ($request->hasFile('image') && $request->image!=null) {
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
        $classified->adcategories_id = $request->category_id;
        $classified->save();

       return response()->json(['data' => $classified , 'message' => 'Ad updated succesfully']);
    }

    public function destroy($id)
    {
        $classified = Classified::find($id);
        $old_image = $classified->image;
        if (file_exists($old_image)) {
            unlink($old_image);
        }
        $classified-> delete();
        if ($classified->count() > 0){
            return response()->json(['data' => $classified,'message' => 'Ad deleted succesfully']);
        }else{
            return response()->json(['message' => 'No Ads found']);
        }
    }
}
