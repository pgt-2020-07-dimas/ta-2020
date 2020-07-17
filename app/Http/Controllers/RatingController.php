<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;

class RatingController extends Controller
{
    public function index()
    {  
        $contractor = Contractor::All();
        // dd($contractor);

        return view('rating.index',compact('contractor'));
    }

    
}
