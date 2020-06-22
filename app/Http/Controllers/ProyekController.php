<?php

namespace App\Http\Controllers;

use App\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $proyek = Proyek::where('user_id',auth()->user()->id)->get();
        //dd($proyek);
        return view('proyek.index',['proyek'=>$proyek]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyek.tambah');
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
            'project_no' => 'required|size:2',
            'project_year' => 'required|size:4',
            'project_title' => 'required|max:50',
            'deskripsi' => 'required|max:100',
            'user_cc' => 'required|max:50',
            'plant' => 'required|max:10',
        ]);

        $proyek = Proyek::create($request->all());            
        $id =$proyek->id;
        return redirect('/proyek'.'/'.$id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function show(Proyek $proyek)
    {
        return view('proyek.detail',['proyek'=>$proyek]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyek $proyek)
    {
        
        return view('proyek.edit',['proyek'=>$proyek]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyek $proyek)
    {
        $request->validate([            
            'project_year' => 'required|size:4',
            'project_title' => 'required|max:50',
            'deskripsi' => 'required|max:100',
            'user_cc' => 'required|max:50',
            'plant' => 'required|max:10',
        ]);
        Proyek::where('id', $proyek->id)
                ->update([
                    'project_year'=>$request->project_year,
                    'project_title'=>$request->project_title,
                    'deskripsi'=>$request->deskripsi,
                    'user_cc'=>$request->user_cc,
                    'plant'=>$request->plant,
                ]);
        return redirect('/proyek'.'/'.$proyek->id.'/edit');
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyek $proyek)
    {
        Proyek::destroy($proyek->id);
        return redirect('/proyek');
    }
    public function tunda(Request $request, Proyek $proyek)
    {
        Proyek::where('id', $request->id)
                ->update([
                    'status'=>$request->status,                    
                ]);
        return redirect('/proyek');
    }
}
