<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\Comment;

class CommentController extends Controller
{
    public function comment(Request $request)
   {
        $this->validate($request, Comment::$rules);
        Comment::create([ 
            'user_id' => Auth::id(), 
            'post_id' => $request->id,
            'comment' => $request->comment, 
        ]);
        return back();
    }
}
