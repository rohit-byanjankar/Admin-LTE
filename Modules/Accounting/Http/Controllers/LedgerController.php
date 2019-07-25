<?php

namespace Modules\Accounting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounting\Entities\Ledger;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $ledger=Ledger::all();
        return view('accounting::ledger.index',compact('ledger'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $request=$request->all();
        return view('accounting::ledger.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ledger_code' => 'required',
            'ledger_name' => 'required',
        ]);

        Ledger::create([
            'ledger_code' => $request->ledger_code,
            'ledger_name' => $request->ledger_name,
            'type' => $request->type,
        ]);

        if (isset($request->backUrl))
        {
             return redirect(route($request->backUrl))->with('sucs', 'Ledger Created Succesfully');
        }

        return redirect(route('ledger.index'))->with('sucs', 'Ledger Created Succesfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('accounting::ledger.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Ledger $ledger)
    {
        return view('accounting::ledger.create',compact('ledger'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Ledger $ledger)
    {
        $request->validate([
            'ledger_code' => 'required',
            'ledger_name' => 'required',
        ]);

        $ledger->ledger_code = $request->ledger_code;
        $ledger->ledger_name = $request->ledger_name;
        $ledger->type = $request->type;
        $ledger->save();

        return redirect(route('ledger.index'))->with('sucs', 'Ledger Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(ledger $ledger)
    {
        $ledger->delete();
        return redirect(route('ledger.index'))->with('err', 'Ledger Deleted Succesfully');
    }
}
