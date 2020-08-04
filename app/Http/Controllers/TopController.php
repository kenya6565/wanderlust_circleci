<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        // $images = [
        //     'photo-1492136344046-866c85e0bf04.jpeg',
        //     'photo-1502602898657-3e91760cbb34.jpeg',
        // ];
        //$index = time() % count($images);
        $collection = 
        collect([
           'photo-1492136344046-866c85e0bf04.jpeg',
            'photo-1502602898657-3e91760cbb34.jpeg',
            'australia.jpeg',
            'dessert.jpeg',
            'greatbarrierleaf.jpg',
            'mtfuji.jpeg',
            'Tajmahal.jpeg',
        ]);
        $random =  $collection->random();
        //dd($random);
        
        return view('welcome',compact('random'));
    }
}
