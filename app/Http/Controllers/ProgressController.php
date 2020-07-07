<?php

namespace App\Http\Controllers;

use App\Progress;
use App\Bill;
use App\Item;
use App\Proyek;
use App\Spk;
use Carbon\Carbon;
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
        $items = Item::where('boq_id',$proyek->boq_id)->get();
        if($proyek->status === 'SPK'){
            $status = true;
        } else {
            $status = false;
        }
        return view('progres.update',compact('items','proyek','status'));
        die;
        $proyek = Proyek::where('id',$id)->first();
        $items = Item::where('boq_id',$proyek->boq_id)->get();
        $spk = Spk::where('id',$proyek->spk_id)->first();
        $start = Carbon::create($spk->start_execution_date);
        $end = Carbon::create($spk->estimate_finish_date);
        $interval = $start->diff($end);
        $interval = $interval->format('%a');
        $totalWeek = intval($interval/7);
        $sisaHari = $interval%7;
        $arrMinggu[]= $start->format('d M y');
        for($i=1;$i<=$totalWeek;$i++){
            $minggu = $start->addWeeks(1); 
            $arrMinggu[]= $minggu->format('d M y');
        }
        if($sisaHari<>0){
            $arrMinggu[]= $end->addDays($sisaHari)->format('d M y');
            $totalWeek +=1;
        }
                
        // dd($totalWeek);
        return view('progres.index', compact('arrMinggu','totalWeek'));
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
        //
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
