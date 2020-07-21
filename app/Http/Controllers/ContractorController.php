<?php

namespace App\Http\Controllers;

use App\Contractor;
use DB;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd($request->name);
        $contractor = Contractor::create($request->all());

        return redirect('/spk'.'/'.$request->spk_id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function show(Contractor $contractor)
    {
        // return $contractor->id;die;  
        $detailRating = Contractor::where('contractors.id',$contractor->id)
                        ->select(DB::raw('projects.project_no,projects.project_title,spks.spk_no,ratings.rating'))
                        ->leftjoin('ratings','contractors.id','=','ratings.contractor_id')
                        ->leftjoin('projects','ratings.id','=','projects.rating_id')
                        ->leftjoin('spks','projects.spk_id','=','spks.id')
                        ->get();
        // return $detailRating;die;
        return view('rating.detail',compact('contractor','detailRating'));
;    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function edit(Contractor $contractor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contractor $contractor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contractor  $contractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contractor $contractor)
    {
        //
    }
}
