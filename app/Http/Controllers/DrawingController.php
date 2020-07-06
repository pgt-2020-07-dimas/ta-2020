<?php

namespace App\Http\Controllers;

use App\Drawing;
use App\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // $file = Drawing::where('project_id', $id)->get();
        // $project_id = $id;
        // return view('desain.index',compact('file', 'project_id'));
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
        $drawing = Drawing::where('project_id',$id)->get();
        // dd($drawing);
        return view('desain.index',compact('id','drawing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('drawing'));
        // $request->validate([
        //     'drawing'=> 'required',
        // ]);
        if($request->file('drawing')<>null){
            // dd($request->file('drawing'));
            $files = $request->file('drawing');
            // dd($files);
            foreach($files as $key=> $file){
                // dd($request->drawing);
                $name = $request->project_id .'-'.time().'-'.$key;
                $extension = $file->getClientOriginalExtension();
                $newName = $name .'.'.$extension;
                //dd($newName);
                // Storage::disk('local')->delete($purchaseRequisition->path);
                $path = Storage::putFileAs('public/drawing', $file, $newName);
                $drawing = Drawing::create([
                    'project_id'=>$request->project_id,
                    'name'=>$newName,
                    'path'=>$path,
                ]);
                $result = Drawing::where('project_id',$request->project_id)->pluck('id');
                $result = count($result);                
                
                if($result == 1){
                    $persentase = Proyek::where('id',$request->project_id)->pluck('persentase')->first();
                    $persentase +=5;
                    Proyek::where('id',$request->project_id)->update([
                        'persentase'=>$persentase,
                    ]);
                }
            }            
        }
        return redirect('/drawing'.'/'.$request->project_id.'/'.'file');
        
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
    public function destroy(Request $request,Drawing $drawing)
    {
        Drawing::destroy($request->id);
        Storage::disk('local')->delete($drawing->path);
        $result = Drawing::where('project_id',$request->project_id)->pluck('id');
        $result = count($result);                
        
        if($result == 0){
            $persentase = Proyek::where('id',$request->project_id)->pluck('persentase')->first();
            $persentase -=5;
            Proyek::where('id',$request->project_id)->update([
                'persentase'=>$persentase,
            ]);
        }
        return redirect('/drawing'.'/'.$request->project_id.'/file');        
    }

}
