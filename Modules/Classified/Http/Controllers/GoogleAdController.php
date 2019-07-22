<?php

namespace Modules\Classified\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Classified\Entities\GoogleAd;

class GoogleAdController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $classifieds=GoogleAd::all();
        return view('classified::googlead.index',compact('classifieds'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('classified::googlead.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'description' => 'required'
        ]);
            GoogleAd::create([
            'code' => $request->code,
            'description' => $request->description
        ]);
        session()->flash('sucs', 'GoogleAd created successfully');
        return redirect(route('googleadsense.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $classifieds=GoogleAd::find($id);
        return view('classified::googlead.create',compact('classifieds'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $ad=GoogleAd::find($id);
        $request->validate([
            'code' => 'required',
            'description' => 'required'
        ]);
        $ad->code = $request->code;
        $ad->description = $request->description;
        $ad->save();
        session()->flash('sucs', 'GoogleAd updated successfully');
        return redirect(route('googleadsense.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $ad=GoogleAd::find($id);
        $ad->delete();
        session()->flash('err', 'GoogleAd deleted successfully');
        return redirect(route('googleadsense.index'));
    }
}
