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
            ->paginate(8); 
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
            ->paginate(8); 
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
            ->where('project_year','LIKE',"%{$tahun}%")
            ->where('plant','LIKE',"%{$plant}%")
            ->paginate(8); 

        //dd($proyek);
        $pro = Proyek::where('user_id',auth()->user()->id)->where('status', 'Suspend')->get();
        return view('histori.page',['proyek'=>$proyek],['pro'=>$pro])->render();     }
    }

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
        return view('progres.batal', compact('total','tanggal','proyek','pr','spk','boq'))
        
        
    }
}
