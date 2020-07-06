<?php

namespace App\Http\Controllers;

use App\Spk;
use App\Proyek;
use App\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpkController extends Controller
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
        return view('spk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $spk = Spk::create($request->all());   
        $spk_id =$spk->id;
        $persentase = Proyek::where('id',$request->id)->pluck('persentase')->first();        
        $persentase +=2;
        Proyek::where('id', $request->id)
                ->update([
                    'spk_id'=>$spk_id,
                    'persentase'=>$persentase,
                    'status'=> 'SPK'
                ]);
        // $items = Item::where('boq_id',$boq_id)->get();
        return redirect('/spk'.'/'.$spk_id.'/edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function show(Spk $spk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function edit(Spk $spk)
    {

        $proyek = Proyek::where('spk_id',$spk->id)->first();
        $contractor = Contractor::orderBy('updated_at','desc')->get();
        return view('spk.edit', compact('contractor', 'proyek', 'spk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spk $spk)
    {
        if($request->file('spk')<>null){
            $file = $request->file('spk');
            $name = $spk->id .'-'.time();
            $extension = $file->getClientOriginalExtension();
            $newName = $name .'.'.$extension;
            //dd($newName);
            Storage::disk('local')->delete($spk->path);
            $path = Storage::putFileAs('public/spk', $file, $newName);
            // $path = Storage::putFile('public/spk', $request->file('spk'));
            } else {
                $path = $spk->path;
            }
        Spk::where('id',$spk->id)->update([
            'spk_no'=>$request->spk_no,
            'start_execution_date'=>$request->start_execution_date,
            'estimate_finish_date'=>$request->estimate_finish_date,
            'contractor_id'=>$request->contractor_id,
            'path'=>$path,
        ]);
        return redirect('/spk'.'/'.$spk->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spk  $spk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spk $spk)
    {
        //
    }
}
