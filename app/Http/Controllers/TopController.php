<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        $collection = 
            collect([
                'effeltower.jpeg',
                'thai.jpg',
                'australia.jpeg',
                'colosseo.jpeg',
                'pyramid.jpg',
                'shanghai.jpg',
                'dessert.jpeg',
                'greatbarrier.webp',
                'mtfuji.jpeg',
                'Tajmahal.jpeg',
            ]);
        $random =  $collection->random();
        
        return view('welcome',compact('random'));
    }
}
