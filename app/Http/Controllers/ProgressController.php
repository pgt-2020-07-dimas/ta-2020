<?php

namespace App\Http\Controllers;

use App\Progress;
use App\Bill;
use App\Item;
use App\Proyek;
use App\Spk;
use App\PurchaseRequisition;
use App\Arrive;
use App\Perkembangan;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $proyek = Proyek::where('id',$id)->first();
      
        // $items = Item::where('boq_id',$proyek->boq_id)->get();
        $items = Item::where('items.boq_id', $proyek->boq_id)
                    ->select(DB::raw('items.id, items.boq_id,items.item_name,items.quantity as qtyAsli,sum(progresses.quantity) as qtyDtg,items.persentase'))
                        ->leftJoin('progresses','items.id','=','progresses.item_id')
                        ->groupBy('items.id')
                        ->get();
        // return $items;die;
        // dd($items[0]->qtyDtg);
        if($proyek->status === 'SPK' or $proyek->status === 'On progress' or $proyek->status === 'Finish'){
            $status = true;
        } else {
            $status = false;
        }
        
        $arrives = Arrive::where('boq_id',$proyek->boq_id)
            ->get()
            ->map(function ($arrives) {
                $arrives->path = str_replace('public', 'storage', $arrives->path);
                return $arrives;
            });
        $perkembangan = Perkembangan::where('boq_id',$proyek->boq_id)
                ->get()
                ->map(function ($perkembangan) {
                    $perkembangan->path = str_replace('public', 'storage', $perkembangan->path);
                    return $perkembangan;
                });
        // $history = Progress::leftJoin('items', 'progresses.item_id', '=', 'items.id')
        //     ->select('progresses.item_id',
        //                 'items.boq_id',
        //                 'items.item_name',
        //                 'progresses.quantity as qtyDtg',
        //                 'items.quantity as qtyAsli',
        //                 'progresses.bobot',
        //                 'items.status',
        //                 'items.persentase',
        //                 'progresses.date', 
        //                 'progresses.path' 
        //               )
        //     ->get();
        //     // return $history;die;
        // return view('progres.update',compact('items','proyek','status','history'));
        return view('progres.update', compact('items','status','proyek','arrives','perkembangan'));
        // die;
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {

        $barang = Progress::where('boq_id',$request->boq_id)->sum('bobot');
        $total = ($barang)+($request->pemasangan*20/100);
        if($request->file('perkembangan')<>null){
            $file = $request->file('perkembangan');
            $name = $request->boq_id .'-'. time();
            $extension = $file->getClientOriginalExtension();
            $newName = $name .'.'.$extension;
            $path = Storage::putFileAs('public/perkembangan', $file, $newName);
        } else {
            $path = $request->path;
        }
        $perkembangan = Perkembangan::create([
            'boq_id'=>$request->boq_id,
            'barang'=>$barang,
            'pemasangan'=>$request->pemasangan,
            'total'=>$total,
            'date'=>$request->date,
            'status'=>'1',
            'path'=>$path,
        ]);
        $persenProyek = Proyek::where('boq_id',$request->boq_id)->pluck('persentase');
        // return $persenProyek;die;
        $persenProyek = 20 + ($total * 80/100);
        $persenProyek = number_format($persenProyek,2);
        if($persenProyek > 99){
            $status = 'Finish';
        } else {
            $status = 'On progress';
        }
        $proyek = Proyek::where('boq_id',$request->boq_id)
                ->update([
                    'persentase'=>$persenProyek,
                    'status'=>$status,
                    ]);
                
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;die;
        $qtyDtg = [];
        $qtyDtgs = array_filter($request->qtyDtg);
        foreach($qtyDtgs as $q){
            $qtyDtg[]=$q;
        }
        // return $qtyDtg;die;
        $c = count($request->items);
        // return $c;
        if($request->file('arrive')<>null){
            $file = $request->file('arrive');
            $name = $request->boq_id .'-'. time();
            $extension = $file->getClientOriginalExtension();
            $newName = $name .'.'.$extension;
            $path = Storage::putFileAs('public/arrive', $file, $newName);
        } else {
            $path = $request->path;
        }
        $arrive = Arrive::create([
            'boq_id' => $request->boq_id,
            'date' => $request->date,
            'path' => $path,
        ]);
        // return $arrive->id;die;
        for($i=0;$i<$c;$i++){
            $qtyAsli = $request->qtyAsli[$i];
            $bobot = Item::where('id',$request->items[$i])->pluck('bobot')->first();
            $bobot = ($qtyDtg[$i]/$request->qtyAsli[$i])*$bobot*80; 
            $progres = Progress::create([
                    'item_id' => $request->items[$i],
                    'arrive_id' => $arrive->id,
                    'boq_id' => $request->boq_id,
                    'quantity' => $qtyDtg[$i],
                    'date' => $request->date,
                    'bobot' => $bobot,
                ]);
            $persentase =($qtyDtg[$i]/$request->qtyAsli[$i])*100;
            Item::where('id',$request->items[$i])->update([
                    'persentase'=>$persentase
            ]);
        $jumlah = Progress::where('boq_id',$request->boq_id)->count();
        if($jumlah <> 0){

            $persenBarang = Progress::where('boq_id',$request->boq_id)->sum('bobot');
            // $pemasanganBarang = Progress::where('boq_id',$request->boq_id)->pluck('pemasangan');
            // terakhir disini
            // $persenProyek = Proyek::where('boq_id',$request->boq_id)->pluck('persentase');
            $persenProyek = 20 +($persenBarang*80/100);
            $persenProyek = number_format($persenProyek,2);
            Proyek::where('boq_id',$request->boq_id)->update([
                'persentase'=> $persenProyek,
            ]);
            Perkembangan::where('boq_id',$request->boq_id)->latest()->update([
                'barang'=> $persenBarang,
            ]);
        }
        }
        return redirect()->back();
        // $qtyAsli = Item::where('id',$request->id)->pluck('quantity')->first();;
        // $bobot = Item::where('id',$request->id)->pluck('bobot')->first();
        // if($request->status == null){
        //     $status = 0.5;
        // } else {
        //     $status = $request->status;
        // }
        // $qtyDtg = $request->qty;
        // $bobot = ($qtyDtg/$qtyAsli)*$status*$bobot*100; 

        // if($request->file('item')<>null){
        //     $file = $request->file('item');
        //     $name = $request->id .'-'. $request->qty .'-'. $request->boq_id .'-'.time();
        //     $extension = $file->getClientOriginalExtension();
        //     $newName = $name .'.'.$extension;
        //     $path = Storage::putFileAs('public/item', $file, $newName);
        // } else {
        //     $path = $request->path;
        // }
        // // return $newName;die;
        // $persentase =($qtyDtg/$qtyAsli)*$status*100;
        // Item::where('id',$request->id)->update([
        //         'persentase'=>$persentase
        // ]);
        // $progres = Progress::create([
        //     'item_id' => $request->id,
        //     'boq_id' => $request->boq_id,
        //     'quantity' => $request->qty,
        //     'date' => $request->date,
        //     'bobot' => $bobot,
        //     'path' => $path,
        // ]);
        // return redirect()->back();
    }

    public function histori($id)
    {
        $proyek = Proyek::where('id',$id)->first();
      
        // $items = Item::where('boq_id',$proyek->boq_id)->get();
        $items = Item::where('items.boq_id', $proyek->boq_id)
                    ->select(DB::raw('items.id, items.boq_id,items.item_name,items.quantity as qtyAsli,sum(progresses.quantity) as qtyDtg,items.persentase'))
                        ->leftJoin('progresses','items.id','=','progresses.item_id')
                        ->groupBy('items.id')
                        ->get();
        // return $items;die;
        // dd($items[0]->qtyDtg);
        if($proyek->status === 'SPK' or $proyek->status === 'On progress' or $proyek->status === 'Finish'){
            $status = true;
        } else {
            $status = false;
        }
        
        $arrives = Arrive::where('boq_id',$proyek->boq_id)
            ->get()
            ->map(function ($arrives) {
                $arrives->path = str_replace('public', 'storage', $arrives->path);
                return $arrives;
            });
        $perkembangan = Perkembangan::where('boq_id',$proyek->boq_id)
                ->get()
                ->map(function ($perkembangan) {
                    $perkembangan->path = str_replace('public', 'storage', $perkembangan->path);
                    return $perkembangan;
                });
            // return $history;die;
        return view('progres.histori_finish', compact('items','status','proyek','arrives','perkembangan'));
        // die;      
    }


    public function batal($id)
    {
        $proyek = Proyek::where('id',$id)->first();
      
        // $items = Item::where('boq_id',$proyek->boq_id)->get();
        $items = Item::where('items.boq_id', $proyek->boq_id)
                    ->select(DB::raw('items.id, items.boq_id,items.item_name,items.quantity as qtyAsli,sum(progresses.quantity) as qtyDtg,items.persentase'))
                        ->leftJoin('progresses','items.id','=','progresses.item_id')
                        ->groupBy('items.id')
                        ->get();
        // return $items;die;
        // dd($items[0]->qtyDtg);
        if($proyek->status === 'SPK' or $proyek->status === 'On progress' or $proyek->status === 'Finish'){
            $status = true;
        } else {
            $status = false;
        }
        
        $arrives = Arrive::where('boq_id',$proyek->boq_id)
            ->get()
            ->map(function ($arrives) {
                $arrives->path = str_replace('public', 'storage', $arrives->path);
                return $arrives;
            });
        $perkembangan = Perkembangan::where('boq_id',$proyek->boq_id)
                ->get()
                ->map(function ($perkembangan) {
                    $perkembangan->path = str_replace('public', 'storage', $perkembangan->path);
                    return $perkembangan;
                });
            // return $history;die;
        return view('progres.histori_batal', compact('items','status','proyek','arrives','perkembangan'));
            // return $history;die;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function detailItem($id)
    {
        $item_name = Item::where('id',$id)->pluck('item_name');
        $item_name = $item_name[0];
        $items = Progress::where('item_id',$id)->get();
        // return $item;die;
        return view('progres.status.index',compact('item_name','items'));
    }
    public function detailRiwayat($id)
    {
        $arrives = Progress::where('arrive_id',$id)
        ->select(DB::raw(' items.item_name, progresses.quantity, progresses.date'))
        ->leftJoin('items','progresses.item_id','=','items.id')
        ->get();
        // dd($arrives);
        // return $arrives;die;
        return view('progres.riwayat.index',compact('arrives'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function edit(Progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progress $progress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        // return $request;die;
        Progress::where('arrive_id',$id)->delete();
        Arrive::where('id',$id)->delete();
        Storage::disk('local')->delete($request->path);
        $barang = Progress::where('boq_id',$request->boq_id)->sum('bobot');
        $pemasangan = Perkembangan::where('boq_id',$request->boq_id)->latest()->pluck('pemasangan');
        $pemasangan = $pemasangan[0];
        $total = ($barang)+($pemasangan*20/100);

        $perkembangan = Perkembangan::where('boq_id',$request->boq_id)->latest()
                    ->update([
                        'barang'=>$barang,
                        'total'=>$total
                    ]);
        $persenProyek = 20 + ($total * 80/100);
        $persenProyek = number_format($persenProyek,2);
        $proyek = Proyek::where('boq_id',$request->boq_id)
                ->update([
                    'persentase'=>$persenProyek,
                    ]);
        return redirect()->back();
        
    }
    public function destroy2(Request $request,$id)
    {
        
        Perkembangan::destroy($id);
        Storage::disk('local')->delete($request->path);
        $persenProyek = Perkembangan::where('boq_id',$request->boq_id)->latest()->pluck('total');
        // return count($persenProyek);die;
        $jumlah = count($persenProyek);
        if($jumlah<>null){
            $persenProyek = 20 + ($persenProyek[0]*80/100);
            Proyek::where('boq_id',$request->boq_id)->update([
                'persentase'=>$persenProyek,
            ]);
        } else {
            Proyek::where('boq_id',$request->boq_id)->update([
                'persentase'=>'20',
            ]);
        }
        return redirect()->back();
    }
}
