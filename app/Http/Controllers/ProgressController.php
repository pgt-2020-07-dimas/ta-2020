<?php

namespace App\Http\Controllers;

use App\Progress;
use App\Bill;
use App\Item;
use App\Proyek;
use App\Spk;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $proyek = Proyek::where('id',$id)->first();
        // $items = Item::where('boq_id',$proyek->boq_id)->get();
        $items = Item::where('items.boq_id', $proyek->boq_id)
                    ->select(DB::raw('items.id, items.boq_id,items.item_name,items.quantity as qtyAsli,sum(progresses.quantity) as qtyDtg,items.persentase'))
                        ->leftJoin('progresses','items.id','=','progresses.item_id')
                        ->groupBy('items.id')
                        ->get();
        // return $items;die;
        // dd($items[0]->qtyDtg);
        if($proyek->status === 'SPK'){
            $status = true;
        } else {
            $status = false;
        }

        $history = Progress::leftJoin('items', 'progresses.item_id', '=', 'items.id')
            ->select('progresses.item_id',
                        'items.boq_id',
                        'items.item_name',
                        'progresses.quantity as qtyDtg',
                        'items.quantity as qtyAsli',
                        'progresses.bobot',
                        'items.status',
                        'items.persentase',
                        'progresses.date', 
                        'progresses.path' 
                      )
            ->get();
            // return $history;die;
        return view('progres.update',compact('items','proyek','status','history'));
        die;
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qtyAsli = Item::where('id',$request->id)->pluck('quantity')->first();;
        $bobot = Item::where('id',$request->id)->pluck('bobot')->first();
        if($request->status == null){
            $status = 0.5;
        } else {
            $status = $request->status;
        }
        $qtyDtg = $request->qty;
        $bobot = ($qtyDtg/$qtyAsli)*$status*$bobot*100; 

        if($request->file('item')<>null){
            $file = $request->file('item');
            $name = $request->id .'-'. $request->qty .'-'. $request->boq_id .'-'.time();
            $extension = $file->getClientOriginalExtension();
            $newName = $name .'.'.$extension;
            $path = Storage::putFileAs('public/item', $file, $newName);
        } else {
            $path = $request->path;
        }
        // return $newName;die;
        $persentase =($qtyDtg/$qtyAsli)*$status*100;
        Item::where('id',$request->id)->update([
                'persentase'=>$persentase
        ]);
        $progres = Progress::create([
            'item_id' => $request->id,
            'boq_id' => $request->boq_id,
            'quantity' => $request->qty,
            'date' => $request->date,
            'bobot' => $bobot,
            'path' => $path,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function show(Progress $progress)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function edit(Progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progress $progress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progress $progress)
    {
        //
    }
}
