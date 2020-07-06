<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimelineController extends Controller
{
   public function showTimelinePage()
   {
       return view('auth.timeline');
   }
   
   public function post(Request $request) //ここはあとで実装します。(Requestはpostリクエストを取得するためのものです。)
    {

    }
}
