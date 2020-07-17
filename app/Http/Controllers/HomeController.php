<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyek;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $proyek = Proyek::where('user_id',auth()->user()->id)->get();
        $sa = Proyek::where('user_id',auth()->user()->id)->where('Status', 'Finish')->get();
        $sb = Proyek::where('user_id',auth()->user()->id)->where('Status', 'OnProgress')->get();
        $sc = Proyek::where('user_id',auth()->user()->id)->where('Status', 'SPK/PO')->get();
        $sd = Proyek::where('user_id',auth()->user()->id)->where('Status', 'Aanwijzing')->get();
        $se = Proyek::where('user_id',auth()->user()->id)->where('Status', 'Open PR')->get();
        $sf = Proyek::where('user_id',auth()->user()->id)->where('Status', 'Desain')->get();
        $sg = Proyek::where('user_id',auth()->user()->id)->where('Status', 'Planning')->get();
        $sh = Proyek::where('user_id',auth()->user()->id)->where('Status', 'Suspend')->get();        

        $pa = Proyek::where('user_id',auth()->user()->id)->where('plant', 'Plant A')->get();
        $pb = Proyek::where('user_id',auth()->user()->id)->where('plant', 'Plant BHI')->get();
        $pc = Proyek::where('user_id',auth()->user()->id)->where('plant', 'Plant C')->get();
        $pd = Proyek::where('user_id',auth()->user()->id)->where('plant', 'Plant DK')->get();
        $pm = Proyek::where('user_id',auth()->user()->id)->where('plant', 'Plant M')->get();
        $pe = Proyek::where('user_id',auth()->user()->id)->where('plant', 'Plant E')->get();
        $pr = Proyek::where('user_id',auth()->user()->id)->where('plant', 'Plant R')->get();
        $pj = Proyek::where('user_id',auth()->user()->id)->where('plant', 'Plant J')->get();
        $po = Proyek::where('user_id',auth()->user()->id)->where('plant', 'Other')->get();

        return view('dashboard.index', compact('proyek','sa','sb','sc','sd','se','sf','sg','sh','pa','pb','pc','pd','pm','pe','pr','pj','po'));
    }

    public function tambah()
    {
        
    }
}
