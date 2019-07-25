<?php

namespace Modules\Accounting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Accounting\Entities\Ledger;
use Modules\Accounting\Entities\Sales;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $sales=Sales::all();
        return view('accounting::sales.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $ledgers=Ledger::all();
        return view('accounting::sales.create',compact('ledgers'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ledger_id' => 'required',
            'address' => 'required',
            'pan_number' => 'numeric',
            'phone_number' => 'numeric||digits_between:7,10',
        ]);

        $seller_name=Ledger::where('id',$request->ledger_id)->pluck('ledger_name');
        Sales::create([
            'ledger_id' => $request->ledger_id,
            'customer' => $seller_name[0],
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'pan_number' => $request->pan_number,
        ]);
        return redirect(route('sales.index'))->with('sucs', 'Sales Bill Created Succesfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('accounting::sale.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $sales=Sales::find($id);
        $ledgers=Ledger::all();
        return view('accounting::sales.create',compact('sales','ledgers'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $sales=Sales::find($id);
        $request->validate([
            'address' => 'required',
            'pan_number' => 'numeric',
            'phone_number' => 'numeric||digits_between:7,10',
        ]);

        $seller_name=Ledger::where('id',$request->ledger_id)->pluck('ledger_name');
        $sales->ledger_id = $request->ledger_id;
        $sales->customer = $seller_name[0];
        $sales->address = $request->address;
        $sales->phone_number = $request->phone_number;
        $sales->pan_number = $request->pan_number;
        $sales->save();

        return redirect(route('sales.index'))->with('sucs', 'Bill Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $sales=Sales::find($id);
        $sales->delete();
        return redirect(route('sales.index'))->with('err', 'Bill Deleted Succesfully');

    }
}
