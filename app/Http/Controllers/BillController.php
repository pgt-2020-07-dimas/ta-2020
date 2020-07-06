<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Proyek;
use App\Item;
use Illuminate\Http\Request;

class BillController extends Controller
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
        return view('boq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)    
    {   
        $boq = BIll::create($request->all());   
        $boq_id =$boq->id;
        $persentase = Proyek::where('id',$request->id)->pluck('persentase')->first();
        $persentase +=0;
        Proyek::where('id', $request->id)
                ->update([
                    'boq_id'=>$boq_id,
                    'persentase' => $persentase,
                    'status'=> 'Design',
                ]);
        $proyek = Proyek::where('id',$request->id)->first();        
        $items = Item::where('boq_id',$boq_id)->get();
        return view('boq.tambah',['proyek'=>$proyek,'boq_id'=>$boq_id,'items'=>$items]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'item_name' => 'required',
            'boq_id' => 'required|numeric',
            'specification' => 'required|max:50',
            'tipe' => 'required',
            'quantity' => 'required|numeric',
            'unit' => 'required|alpha',
            'price_unit' => 'required|numeric',
        ]);

        $total_price = $request->quantity * $request->price_unit;
        
        $itemadd = Item::create([
            'item_name'=>$request->item_name,
            'boq_id'=>$request->boq_id,
            'specification'=>$request->specification,
            'tipe'=>$request->tipe,
            'quantity'=>$request->quantity,
            'unit'=>$request->unit,
            'price_unit'=>$request->price_unit,
            'total_price'=>$total_price,
            'status'=>0,
            'persentase'=>0,
        ]);
        $planned_budged = Item::where('boq_id',$request->boq_id)->pluck('total_price')->sum();
        // $bobot = ($itemadd->total_price / $planned_budged) / $itemadd->quantity;

        $iditems = Item::where('boq_id',$request->boq_id)->pluck('id');        

        for ($i=0;$i<count($iditems);$i++){
            $item = Item::find($iditems[$i]);
            $bobot = ($item->total_price/$planned_budged);
            $bobot = round($bobot,6);
            $items = Item::find($iditems[$i])->update([
                'bobot' => $bobot,
            ]);
        }
        
        $bill = BIll::where('id',$request->boq_id)
                    ->update([
                        'planned_budged'=> $planned_budged,
                    ]);
        
        return redirect('/boq'.'/'.$itemadd->boq_id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {   $items = Item::where('boq_id',$bill->id)->get();
        $sum = Item::where('boq_id',$bill->id)->pluck('total_price')->sum();       
        $proyek = Proyek::where('boq_id',$bill->id)->first();
        return view('boq.tambah',['proyek'=>$proyek,'boq_id'=>$bill->id,'items'=>$items,'total'=>$sum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $request->validate([
            'item_name' => 'required',
            'boq_id' => 'required|numeric',
            'specification' => 'required|max:50',
            'tipe' => 'required',
            'quantity' => 'required|numeric',
            'unit' => 'required|alpha',
            'price_unit' => 'required|numeric',
        ]);

        $total_price = $request->quantity * $request->price_unit;
        
        $itemup = Item::where('id',$request->id)->update([
            'item_name'=>$request->item_name,
            'specification'=>$request->specification,
            'tipe'=>$request->tipe,
            'quantity'=>$request->quantity,
            'unit'=>$request->unit,
            'price_unit'=>$request->price_unit,
            'total_price'=>$total_price,
            'status'=>0,
            'persentase'=>0,
        ]);
        $planned_budged = Item::where('boq_id',$request->boq_id)->pluck('total_price')->sum();
        $iditems = Item::where('boq_id',$request->boq_id)->pluck('id');        

        for ($i=0;$i<count($iditems);$i++){
            $item = Item::find($iditems[$i]);
            $bobot = ($item->total_price/$planned_budged);
            $bobot = round($bobot,6);
            $items = Item::find($iditems[$i])->update([
                'bobot' => $bobot,
            ]);
        }
        
        $bill = BIll::where('id',$request->boq_id)
                    ->update([
                        'planned_budged'=> $planned_budged,
                    ]);
        //dd($planned_budged);
        return redirect('/boq'.'/'.$itemup.'/edit');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Bill $bill)
    {
        Item::destroy($request->id);
        
        return redirect('/boq'.'/'.$request->boq_id.'/edit');
    }
}
