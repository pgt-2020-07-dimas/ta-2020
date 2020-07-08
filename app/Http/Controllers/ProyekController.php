<?php

namespace App\Http\Controllers;

use App\Proyek;
use App\Drawing;
use Illuminate\Http\Request;

class ProyekController extends Controller
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
        
        $proyek = Proyek::where('user_id',auth()->user()->id)->paginate(4);  
        //dd($proyek);
        $pro = Proyek::All();
            // dd(count($proyek));                       
        return view('proyek.index',['proyek'=>$proyek],['pro'=>$pro]);
    }

    public function liveSearch(Request $request)
    { 
        $search = $request->cari;
        // dump($search);
        

            $proyek = Proyek::where('user_id',auth()->user()->id)
            ->where('project_title','LIKE',"%{$search}%")
            ->orwhere('project_no','LIKE',"%{$search}%")
            ->paginate(4); 
            $pro = Proyek::All();
            // dd(count($proyek));                       
            return view('proyek.page',['proyek'=>$proyek],['pro'=>$pro]);
        
    }

    public function liveFilter(Request $request)
    { 
        $tahun = $request->tahun;
        $plant = $request->plant;
        $status = $request->status; 
        // dump($tahun);
        // dd($plant);

            $proyek = Proyek::where('user_id',auth()->user()->id)
            ->where('project_year','LIKE',"%{$tahun}%")
            ->where('plant','LIKE',"%{$plant}%")
            ->where('status','LIKE',"%{$status}%")
            ->paginate(4); 
            $pro = Proyek::All();
            // dd(count($proyek));                       
            return view('proyek.page',['proyek'=>$proyek],['pro'=>$pro]);
        
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
        $proyek = Proyek::where('user_id',auth()->user()->id)->paginate(4);  
        //dd($proyek);
        $pro = Proyek::All();
        return view('proyek.page',['proyek'=>$proyek],['pro'=>$pro])->render();     }
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
        $year = substr($request->project_year,2,2);
        $project_no = auth()->user()->departemen .'-'.$year.auth()->user()->kode.'-'.$request->project_no;
        // dd($project_no);
        $proyek = Proyek::create([
            'project_no' => $project_no,
            'project_year' => $request->project_year,
            'project_title' => $request->project_title,
            'deskripsi' => $request->deskripsi,
            'user_cc' => $request->user_cc,
            'user_id' => auth()->user()->id,
            'persentase' => 5,
            'status' => 'Planning',
            'plant' => $request->plant,
        ]);            
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
        $drawing = Drawing::where('project_id',$proyek->id)->get();
        $drawing = count($drawing);
        if ($drawing <> null){
            $drawing = true;
        } else {
            $drawing = false;
        }
        // dd($drawing);
        return view('proyek.edit',compact('proyek','drawing'));
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
