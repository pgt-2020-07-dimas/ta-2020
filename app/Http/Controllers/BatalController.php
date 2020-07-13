<?php

namespace App\Http\Controllers;
use App\Proyek;
use App\Drawing;
use App\Item;
use App\Spk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BatalController extends Controller
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
        
        $proyek = Proyek::where('user_id',auth()->user()->id)->where('status', 'Suspend')->paginate();  
        $project_year = Proyek::select('project_year')
                 ->groupBy('project_year')
                 ->get();
        $plant = Proyek::select('plant')
                 ->groupBy('plant')
                 ->get();
        // $status = Proyek::select('status')
        //          ->groupBy('status')
        //          ->get();
        
        $pro = Proyek::where('user_id',auth()->user()->id)->where('status', 'Suspend')->get();

        //dd($proyek);
        return view('batal.index',compact('proyek','project_year','plant','pro'));
    }

    public function liveSearch(Request $request)
    { 
        $tahun = $request->tahun;
        $plant = $request->plant;
        $search = $request->cari;
        // dump($search);
        

            $proyek = Proyek::where('user_id',auth()->user()->id)
            ->where('status', 'Suspend')
            ->where(function($query) use ($search) {
                $query->where('project_title','LIKE',"%".$search."%")
                    ->orWhere('project_no','LIKE',"%".$search."%");
            })
            ->where('project_year','LIKE',"%{$tahun}%")
            ->where('plant','LIKE',"%{$plant}%")
            ->paginate(4); 
            $pro = Proyek::where('user_id',auth()->user()->id)->where('status', 'Suspend')->get();
            // dd(count($proyek));                       
            return view('batal.page',['proyek'=>$proyek],['pro'=>$pro]);
        
    }

    public function liveFilter(Request $request)
    {   
        $tahun = $request->tahun;
        $plant = $request->plant; 
        $search = $request->cari;
        // dump($tahun);
        // dd($plant);

            $proyek = Proyek::where('user_id',auth()->user()->id)
            ->where('status', 'Suspend')
            // ->where('project_title','LIKE',"%{$search}%")
            ->where(function($query) use ($search) {
                $query->where('project_title','LIKE',"%".$search."%")
                    ->orWhere('project_no','LIKE',"%".$search."%");
            })
            ->where('project_year','LIKE',"%{$tahun}%")
            ->where('plant','LIKE',"%{$plant}%")
            // ->orwhere('project_no','LIKE',"%{$search}%")
            ->paginate(4); 
            $pro = Proyek::where('user_id',auth()->user()->id)->where('status', 'Suspend')->get();
            // dd(count($proyek));                       
            return view('batal.page',['proyek'=>$proyek],['pro'=>$pro]);
        
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
        //  dd($request->tahun);
        $tahun = $request->tahun;
        $plant = $request->plant;
        $search = $request->cari; 

        $proyek = Proyek::where('user_id',auth()->user()->id)
            ->where('status', 'Suspend')
            ->where(function($query) use ($search) {
                $query->where('project_title','LIKE',"%".$search."%")
                    ->orWhere('project_no','LIKE',"%".$search."%");
            })
            ->where('status', 'Finish')
            ->where('project_year','LIKE',"%{$tahun}%")
            ->where('plant','LIKE',"%{$plant}%")
            ->paginate(4); 

        //dd($proyek);
        $pro = Proyek::where('user_id',auth()->user()->id)->where('status', 'Suspend')->get();
        return view('histori.page',['proyek'=>$proyek],['pro'=>$pro])->render();     }
    }

    public function show(Proyek $proyek)
    {
        $proyek = Proyek::where('id',$proyek->id)->first();
        if ($proyek->spk_id <> 1){
            $arrMinggu[]=null;            
            $totalWeek = null;
            return view('progres.batal', compact('arrMinggu','totalWeek','proyek'));
        } else {
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
            return view('progres.batal', compact('arrMinggu','totalWeek','proyek'));
        }
        
    }
}
