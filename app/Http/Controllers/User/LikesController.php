<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
    public function store(Request $request, $id)
    {
            \Auth::user()->like($id);
            return back();
    }

    public function destroy($id)
    {
            \Auth::user()->unlike($id);
            return back();
    }
}
