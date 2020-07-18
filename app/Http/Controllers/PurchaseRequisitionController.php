<?php

namespace App\Http\Controllers;

use App\PurchaseRequisition;
use App\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PurchaseRequisitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $persentase = Proyek::where('id',$request->id)->pluck('persentase')->first();        
        $persentase +=2;
        Proyek::where('id', $request->id)
                ->update([
                    'pr_id'=>$pr_id,
                    'persentase'=>$persentase,
                    'status'=>'Open PR'
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
        // dd($request->file('pr'));
        //  $path = $request->file('pr')->store('/pr');
         //dd($ $request->file('pr'));
        $request->validate([
            'pr_no' => 'required|numeric',
            'aanwijzing_date' => 'date|nullable',
            'bid_submission_date' => 'date|nullable',
        ]);
        //  $path = $request->file('pr')->store('/pr');
        // dd($path);
        // 'path'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        if($request->file('pr')<>null){
        $file = $request->file('pr');
        $name = $purchaseRequisition->id .'-'.time();
        $extension = $file->getClientOriginalExtension();
        $newName = $name .'.'.$extension;
        //dd($newName);
        Storage::disk('local')->delete($purchaseRequisition->path);
        $path = Storage::putFileAs('public/pr', $file, $newName);
        // $path = Storage::putFile('public/pr', $request->file('pr'));
        } else {
            $path = $purchaseRequisition->path;
        }        
        PurchaseRequisition::where('id', $purchaseRequisition->id)
        ->update([
            'pr_no'=>$request->pr_no,
            'aanwijzing_date'=>$request->aanwijzing_date,
            'bid_submission_date'=>$request->bid_submission_date,
            'path'=>$path,
        ]);
        //dd($path);
        $status = PurchaseRequisition::where('id', $purchaseRequisition->id)->pluck('aanwijzing_date')->first();
        if ($status <> null){
            $persentase = Proyek::where('pr_id',$purchaseRequisition->id)->pluck('persentase')->first();
            if($persentase < 18){                
                $persentase +=1;
                Proyek::where('pr_id', $purchaseRequisition->id)
                    ->update([
                        'status'=>'Aanwijzing',
                    ]); 
            }     
            Proyek::where('pr_id', $purchaseRequisition->id)
                    ->update([
                        'persentase'=>$persentase,
                    ]); 
        }
        // dd($status);
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
