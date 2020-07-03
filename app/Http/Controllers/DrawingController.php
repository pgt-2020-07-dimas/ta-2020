<?php

namespace App\Http\Controllers;

use App\Drawing;
use Illuminate\Http\Request;

class DrawingController extends Controller
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
    public function index($id){
        $file = Drawing::where('project_id', $id)->get();
        $project_id = $id;
        return view('desain.index',compact('file', 'project_id'));
    //  $file = Drawing::all();
    //     return view('desain.index',compact('file'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $file = new Drawing();
        $project_id = $id;
        return view('desain.create',compact('file'), compact('project_id'))->renderSections()['content'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'proyek_id' => 'required',
            'nama' => 'required',
            'path' => 'required'
        ]);

        $maxId = \DB::table('drawings')->max('id') + 1;
        try{       
            $uploaded = $request->file('path');
            $file = new Drawing();
            $file->id = $maxId;
            $file->project_id = $request->proyek_id;
            $file->name = $request->nama;
            $file->path = $maxId."-".$uploaded->getClientOriginalName();
            $file->save();
        
            $uploaded->move(public_path('images/'),$file->path); //Folder lokasi File
            \Session::flash('flash_message','Gambar berhasil ditambahkan');
        }catch(\Exception $e){
                echo $e->getMessage();
                echo "<br>".$e->getLine();
                die();
        }
        
            $response = array(
                'status' => 'success',
                'url' => action('DrawingController@index',$id),
            );
            return $response;
            }

    /**
     * Display the specified resource.
     *
     * @param  \App\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // dd($id);
        // $file = Drawing::where('project_id', $id)->get();
        // $project_id = $id;
        // return view('desain.index',compact('file', 'project_id'), compact('project_id'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function edit(Drawing $drawing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drawing $drawing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drawing  $drawing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $drawing)
    {
        $file = Drawing::findOrFail($drawing);
        unlink(public_path('images/').$file->path); //menghapus dokumen pada folder terkait
        $file->delete();
        
        \Session::flash('flash_message','Dokumen berhasil di hapus');
        
        return redirect()->action('DrawingController@index', $id);
        
    }

}
