<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
    public function store(Request $request)
    {
        //\Log::debug($id);
        $like = \Auth::user()->like($request->id);
        //dd($like);
        //echo json_encode($like);
        // return response()->json([
        //   'status' => 'success'
        // ]);
        
        return back();
    }

    public function destroy(Request $request)
    {
        $unlike = \Auth::user()->unlike($request->id);
        //echo json_encode($unlike);
        return back();
        // return response()->json([
        //   'status' => 'success'
        // ]);
    }
}
