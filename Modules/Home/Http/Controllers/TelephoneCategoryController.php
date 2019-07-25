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
        $directories= PhoneDirectory::where("category_id",$Category_id)->paginate(5);
        return view('home::telephonedir.index',['grouped' => $posts])->with('limposts',Post::orderBy('updated_at','desc')->limit(4)->get());
    }
}
