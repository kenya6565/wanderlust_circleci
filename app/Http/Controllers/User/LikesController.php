<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
    public function store(Request $request)
    {
       
        \Auth::user()->like($request->id);
        return back();
    }

    public function destroy(Request $request)
    {
        \Auth::user()->unlike($request->id);
        return back();
        
    }
}
