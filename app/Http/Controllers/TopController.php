<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        $collection = 
            collect([
                'photo-1492136344046-866c85e0bf04.jpeg',
                'photo-1502602898657-3e91760cbb34.jpeg',
                'australia.jpeg',
                'dessert.jpeg',
                'greatbarrier.webp',
                'mtfuji.jpeg',
                'Tajmahal.jpeg',
            ]);
        $random =  $collection->random();
        
        return view('welcome',compact('random'));
    }
}
