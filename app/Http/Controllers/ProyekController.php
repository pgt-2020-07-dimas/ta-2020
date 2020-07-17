<?php

namespace App\Http\Controllers;

use App\Proyek;
use App\Drawing;
use App\Item;
use App\Spk;
use App\Bill;
use App\PurchaseRequisition;
use App\Perkembangan;
use Carbon\Carbon;
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
        
        // $pro = Proyek::All();
        //     // dd(count($proyek));                       
        // return view('proyek.index',['proyek'=>$proyek],['pro'=>$pro]);
        $proyek = Proyek::where('user_id',auth()->user()->id)->paginate();  
        $project_year = Proyek::select('project_year')
                 ->groupBy('project_year')
                 ->get();
        $plant = Proyek::select('plant')
                 ->groupBy('plant')
                 ->get();
        $status = Proyek::select('status')
                 ->groupBy('status')
                 ->get();
        
        $pro = Proyek::where('user_id',auth()->user()->id)->get();

        //dd($proyek);
        return view('proyek.index',compact('proyek','project_year','plant','status','pro'));
    }

    public function liveSearch(Request $request)
    { 
        $tahun = $request->tahun;
        $plant = $request->plant;
        $status = $request->status; 
        $search = $request->cari;
        // dump($search);
        

            $proyek = Proyek::where('user_id',auth()->user()->id)
            ->where(function($query) use ($search) {
                $query->where('project_title','LIKE',"%".$search."%")
                    ->orWhere('project_no','LIKE',"%".$search."%");
            })
            ->where('project_year','LIKE',"%{$tahun}%")
            ->where('plant','LIKE',"%{$plant}%")
            ->where('status','LIKE',"%{$status}%")
            ->paginate(4); 
            $pro = Proyek::where('user_id',auth()->user()->id)->get();
            // dd(count($proyek));                       
            return view('proyek.page',['proyek'=>$proyek],['pro'=>$pro]);
        
    }

    public function liveFilter(Request $request)
    {   
        $tahun = $request->tahun;
        $plant = $request->plant;
        $status = $request->status; 
        $search = $request->cari;
        // dump($tahun);
        // dd($plant);

            $proyek = Proyek::where('user_id',auth()->user()->id)
            // ->where('project_title','LIKE',"%{$search}%")
            ->where(function($query) use ($search) {
                $query->where('project_title','LIKE',"%".$search."%")
                    ->orWhere('project_no','LIKE',"%".$search."%");
            })
            ->where('project_year','LIKE',"%{$tahun}%")
            ->where('plant','LIKE',"%{$plant}%")
            ->where('status','LIKE',"%{$status}%")
            // ->orwhere('project_no','LIKE',"%{$search}%")
            ->paginate(4); 
            $pro = Proyek::where('user_id',auth()->user()->id)->get();
            // dd(count($proyek));                       
            return view('proyek.page',['proyek'=>$proyek],['pro'=>$pro]);
        
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
        //  dd($request->tahun);
        $tahun = $request->tahun;
        $plant = $request->plant;
        $status = $request->status;  
        $search = $request->cari;

        $proyek = Proyek::where('user_id',auth()->user()->id)
            ->where(function($query) use ($search) {
                $query->where('project_title','LIKE',"%".$search."%")
                    ->orWhere('project_no','LIKE',"%".$search."%");
            })
            ->where('project_year','LIKE',"%{$tahun}%")
            ->where('plant','LIKE',"%{$plant}%")
            ->where('status','LIKE',"%{$status}%")
            ->paginate(4); 

        //dd($proyek);
        $pro = Proyek::where('user_id',auth()->user()->id)->get();
        return view('proyek.page',['proyek'=>$proyek],['pro'=>$pro])->render();     }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tahun = Proyek::select('project_year',Proyek::raw('count(*) as total'))
        //          ->groupBy('project_year')
        //          ->first();
        // dd($tahun);
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
            'project_no' => 'required|size:2|unique:projects',
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
        $proyek = Proyek::where('id',$proyek->id)->first();
        $spk = Spk::where('id',$proyek->spk_id)->first();
        $pr = PurchaseRequisition::where('id',$proyek->pr_id)->first();
        $boq = Bill::where('id',$proyek->boq_id)->first();
        $total = Perkembangan::where('boq_id',$proyek->boq_id)->pluck('total');
        $total= str_replace('"', '', $total);
        $tanggal = Perkembangan::where('boq_id',$proyek->boq_id)->pluck('date');
        // return $total;die;
        return view('progres.index', compact('total','tanggal','proyek','pr','spk','boq'));
        // if ($proyek->spk_id <> 1){
        //     $arrMinggu[]=null;            
        //     $totalWeek = null;
        //     return view('progres.index', compact('arrMinggu','totalWeek','proyek'));
        // } else {
        //     $items = Item::where('boq_id',$proyek->boq_id)->get();
        //     $spk = Spk::where('id',$proyek->spk_id)->first();
        //     $start = Carbon::create($spk->start_execution_date);
        //     $end = Carbon::create($spk->estimate_finish_date);
        //     $interval = $start->diff($end);
        //     $interval = $interval->format('%a');
        //     $totalWeek = intval($interval/7);
        //     $sisaHari = $interval%7;
        //     $arrMinggu[]= $start->format('d M y');
        //     for($i=1;$i<=$totalWeek;$i++){
        //         $minggu = $start->addWeeks(1); 
        //         $arrMinggu[]= $minggu->format('d M y');
        //     }
        //     if($sisaHari<>0){
        //         $arrMinggu[]= $end->addDays($sisaHari)->format('d M y');
        //         $totalWeek +=1;
        //     }
        
        // dd($totalWeek);
        //return view('progres.index', compact('arrMinggu','totalWeek','proyek'));
        //}
        // arrMinggu diatas
        
    }
    public function detail(Request $request,$id){
        $proyek = Bill::where('id', $id)
                ->update([
                    'actual_budged'=>$request->actual_budged
                ]);
        return redirect()->back();
                
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
