<?php

namespace App\Http\Controllers;

use App\PurchaseRequisition;
use App\Proyek;
use Illuminate\Http\Request;

class PurchaseRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchase.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pr = PurchaseRequisition::create($request->all());   
        $pr_id =$pr->id;
        Proyek::where('id', $request->id)
                ->update([
                    'pr_id'=>$pr_id,
                ]);
        // $items = Item::where('boq_id',$boq_id)->get();
        return redirect('/pr'.'/'.$pr_id.'/edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PurchaseRequisition  $purchaseRequisition
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseRequisition $purchaseRequisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PurchaseRequisition  $purchaseRequisition
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseRequisition $purchaseRequisition)
    {
        
        $proyek = Proyek::where('pr_id',$purchaseRequisition->id)->first();
        return view('pr.edit',['purchaseRequisition'=>$purchaseRequisition], compact('proyek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PurchaseRequisition  $purchaseRequisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseRequisition $purchaseRequisition)
    {
        $request->validate([
            'pr_no' => 'required|numeric',
            'aanwijzing_date' => 'required|date',
            'bid_submission_date' => 'required|date',
        ]);

        PurchaseRequisition::where('id', $purchaseRequisition->id)
        ->update([
            'pr_no'=>$request->pr_no,
            'aanwijzing_date'=>$request->aanwijzing_date,
            'bid_submission_date'=>$request->bid_submission_date,
        ]);
        return redirect('/pr'.'/'.$purchaseRequisition->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseRequisition  $purchaseRequisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseRequisition $purchaseRequisition)
    {
        //
    }
}
