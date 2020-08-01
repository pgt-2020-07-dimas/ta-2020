<?php

namespace App\Http\Controllers;
use App\Proyek;
use App\Rating;
use App\Contractor;
use App\Spk;
use App\Bill;
use App\PurchaseRequisition;
use App\Perkembangan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoriController extends Controller
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
        
        $proyek = Proyek::where('user_id',auth()->user()->id)->where('status', 'Finish')->paginate();  
        $project_year = Proyek::select('project_year')->where('status','Finish')
                 ->groupBy('project_year')
                 ->get();
        $plant = Proyek::select('plant')->where('status','Finish')
                 ->groupBy('plant')
                 ->get();
        // $status = Proyek::select('status')
        //          ->groupBy('status')
        //          ->get();
        
        $pro = Proyek::where('user_id',auth()->user()->id)->where('status', 'Finish')->get();

        //dd($proyek);
        return view('histori.index',compact('proyek','project_year','plant','pro'));
    }

    public function liveSearch(Request $request)
    { 
        $tahun = $request->tahun;
        $plant = $request->plant;
        $search = $request->cari;
        // dump($search);
        

            $proyek = Proyek::where('user_id',auth()->user()->id)
            ->where('status', 'Finish')
            ->where(function($query) use ($search) {
                $query->where('project_title','LIKE',"%".$search."%")
                    ->orWhere('project_no','LIKE',"%".$search."%");
            })
            ->where('project_year','LIKE',"%{$tahun}%")
            ->where('plant','LIKE',"%{$plant}%")
            ->paginate(8); 
            $pro = Proyek::where('user_id',auth()->user()->id)->where('status', 'Finish')->get();
            // dd(count($proyek));                       
            return view('histori.page',['proyek'=>$proyek],['pro'=>$pro]);
        
    }

    public function liveFilter(Request $request)
    {   
        $tahun = $request->tahun;
        $plant = $request->plant; 
        $search = $request->cari;
        // dump($tahun);
        // dd($plant);

            $proyek = Proyek::where('user_id',auth()->user()->id)
            ->where('status', 'Finish')
            // ->where('project_title','LIKE',"%{$search}%")
            ->where(function($query) use ($search) {
                $query->where('project_title','LIKE',"%".$search."%")
                    ->orWhere('project_no','LIKE',"%".$search."%");
            })
            ->where('project_year','LIKE',"%{$tahun}%")
            ->where('plant','LIKE',"%{$plant}%")
            // ->orwhere('project_no','LIKE',"%{$search}%")
            ->paginate(8); 
            $pro = Proyek::where('user_id',auth()->user()->id)->where('status', 'Finish')->get();
            // dd(count($proyek));                       
            return view('histori.page',['proyek'=>$proyek],['pro'=>$pro]);
        
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
            ->where('status', 'Finish')
            ->where(function($query) use ($search) {
                $query->where('project_title','LIKE',"%".$search."%")
                    ->orWhere('project_no','LIKE',"%".$search."%");
            })
            ->where('project_year','LIKE',"%{$tahun}%")
            ->where('plant','LIKE',"%{$plant}%")
            ->paginate(8); 

        //dd($proyek);
        $pro = Proyek::where('user_id',auth()->user()->id)->where('status', 'Finish')->get();
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
        return view('progres.finish', compact('total','tanggal','proyek','pr','spk','boq'));
        
        
    }
    
    public function rating(Proyek $proyek)
    {
        $proyek = Proyek::where('id',$proyek->id)->first();
        $spk    = Spk::where('id', $proyek->spk_id)->first();
        $contraktor = Contractor::where('id', $spk->contractor_id)->first();
       //dd($contraktor->name);
        return view('histori.rating', compact('proyek','spk','contraktor'));
    }

    public function store(Request $request)
    {
        $a1 = 2/100*$request->a1;
        $a2 = 3/100*$request->a2;
        $a3 = 5/100*$request->a3;
        $b1 = 10/100*$request->b1;
        $b2 = 15/100*$request->b2;
        $c1 = 5/100*$request->c1;
        $c2 = 15/100*$request->c2;
        $d1 = 10/100*$request->d1;
        $d2 = 5/100*$request->d2;
        $d3 = 5/100*$request->d3;
        $e1 = 10/100*$request->e1;
        $e2 = 5/100*$request->e2;
        $f1 = 5/100*$request->f1;
        $g1 = 2/100*$request->g1;
        $g2 = 3/100*$request->g2;

        $hasil = ($a1+$a2+$a3+$b1+$b2+$c1+$c2+$d1+$d2+$d3+$e1+$e2+$f1+$g1+$g2);

        $rating2 = Rating::create([
            'contractor_id' => $request->kontraktor,
            'rating' => $hasil,
            'deskripsi' => $request->deskripsi,
        ]);  
        $rating = Rating::where('contractor_id',$request->kontraktor)->avg('rating');
        $contractor = Contractor::where('id',$request->kontraktor)->update([
            'rating'=>$rating
        ]);
        $proyek = Proyek::where('spk_id',$request->spk_id)
                    ->update([
                        'rating_id'=> $rating2->id
                    ]);
        //sini men
        // dd($proyek);
        return redirect('/rating');
        // return redirect('/histori'.'/'.$request->project_id.'/');
    }
}