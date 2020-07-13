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
        //dd($request);
        
        $validator = $request->validate([ 
            'comment' => ['required', 'string', 'max:140'], 
        ]);
        Comment::create([ 
            'user_id' => Auth::id(), 
            'post_id' => $request->id,
            'comment' => $request->comment, 
        ]);
        
        
        // $comment = new Comment;
        // $form = $request->all();
        // $comment->fill($form);
        // $comment->save();
        
        
        return back();
    }
}
