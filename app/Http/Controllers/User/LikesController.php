<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
    public function store(Request $request, $id)
    {
        $like= \Auth::user()->like($id);
        $json = json_encode($like);
        echo $json;
        //return back();
    }

    public function destroy($id)
    {
        \Auth::user()->unlike($id);
        return back();
    }
}
