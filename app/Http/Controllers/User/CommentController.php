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
        //dd($request->post_id);
        $this->validate($request, Comment::$rules);
        Comment::create([ 
            'user_id' => Auth::id(), 
            'post_id' => $request->post_id,
            'comment' => $request->comment, 
        ]);
        return redirect(route('user_postdetail',['id'=>$request->post_id]))->with('flash_message', 'コメントが完了しました');
    }
}
