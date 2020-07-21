<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;


class RatingController extends Controller
{
    public function index()
    {  
        $rating = Contractor::all();
        // dd($contractor);
        $pro = Contractor::all();
        return view('rating.index',compact('rating', 'pro'));
    }

    public function liveSearch(Request $request)
    { 
        
        $search = $request->cari;
        // dd($search);
        // dump($search);
        

            $rating = Contractor::where(function($query) use ($search) {
                $query->where('name','LIKE',"%".$search."%")
                    ->orWhere('alamat','LIKE',"%".$search."%")
                    ->get();
            })
          
            ->paginate(8); 
            // dd(count($rating));  
            $pro = Contractor::all();
            return view('rating.page',['rating'=>$rating],['pro'=>$pro]);
        
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
        //  dd($request->tahun);

        $search = $request->cari; 

        $rating = Contractor::all()
            ->where(function($query) use ($search) {
                $query->where('name','LIKE',"%".$search."%")
                    ->orWhere('alamat','LIKE',"%".$search."%");
            })
            ->paginate(8); 

        //dd($proyek);
        $pro = Contractor::all();

        return view('rating.page',['rating'=>$rating],['pro'=>$pro])->render();     
        }
    }


    
}
