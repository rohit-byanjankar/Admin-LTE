<?php

namespace Modules\Accounting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Accounting\Entities\Ledger;
use Modules\Accounting\Entities\Purchase;
use Modules\Accounting\Entities\purchaseDetail;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $purchase=Purchase::all();
        return view('accounting::purchase.index',compact('purchase'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $ledgers=Ledger::all();
        return view('accounting::purchase.create',compact('ledgers'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'taxable_amount' => 'required',
            'invoice_no' => 'required',
            'total' => 'required',
            'vat' => 'required',
            'ledger_id' => 'required',
            'address' => 'required',
            'phone_number' => 'numeric||digits_between:7,10',
            'pan_number' => 'numeric',
            'particular' => 'required',
            'quantity' => 'required',
            'rate' => 'required',
            'amount' => 'required',
        ]);

        $biller_name=Ledger::where('id',$request->ledger_id)->pluck('ledger_name');
        Purchase::create([
            'ledger_id' => $request->ledger_id,
            'biller' => $biller_name[0],
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'pan_number' => $request->pan_number,
            'date' => $request->date,
            'invoice_no' => $request->invoice_no,
            'taxable_amount' => $request->taxable_amount,
            'vat' => $request->vat,
            'total' => $request->total,
            'updated_by' => Auth::user()->id,
        ]);

        $size=sizeof($request->particular);
        for ($i=0;$i<$size;$i++){
            purchaseDetail::create([
                'particular' => $request->particular[$i],
                'quantity' => $request->quantity[$i],
                'rate' => $request->rate[$i],
                'amount' => $request->amount[$i],
                'purchase_id' => $request->ledger_id,
            ]);
        }

        return redirect(route('purchase.index'))->with('sucs', 'Bill Created Succesfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $purchase=Purchase::find($id);
        return view('accounting::purchase.show',compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Purchase $purchase)
    {
        $ledgers=Ledger::all();
        return view('accounting::purchase.create',compact('purchase','ledgers'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'address' => 'required',
            'taxable_amount' => 'required',
            'total_amount' => 'required',
            'vat' => 'required',
            'pan_number' => 'numeric',
            'phone_number' => 'numeric||digits_between:7,10',
        ]);
        $biller_name=Ledger::where('id',$request->ledger_id)->pluck('ledger_name');
            $purchase->ledger_id = $request->ledger_id;
            $purchase->biller = $biller_name[0];
            $purchase->address = $request->address;
            $purchase->phone_number = $request->phone_number;
            $purchase->pan_number = $request->pan_number;
            $purchase->save();

        return redirect(route('purchase.index'))->with('sucs', 'Bill Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect(route('purchase.index'))->with('err', 'Bill Deleted Succesfully');
    }
}
