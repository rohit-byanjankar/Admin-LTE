<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\TelephoneDirectory\Entities\PhoneCategory;
use Modules\TelephoneDirectory\Entities\PhoneDirectory;

class TelephoneCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getCategory($Category_id)
    {
        $categories = PhoneCategory::all();
        $directories=PhoneDirectory::where("phone_category_id",$Category_id)->paginate(5);
        return view('home::telephonedir.index',compact('directories','categories'));
    }
}
