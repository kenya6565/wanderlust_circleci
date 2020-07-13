<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\Post;
use \App\Comment;

class TimelineController extends Controller
{
    
   public function index(Request $request)
   {
       $user = Auth::id();
       
       //ログインユーザのフィールド
       $posts = Post::where('user_id',$user)->latest()->get();
       return view('auth.timeline', compact('posts'));
       
   }
   
   public function post(Request $request)
   {
        $validator = $request->validate([ 
            'post' => ['required', 'string', 'max:140'], 
        ]);
        Post::create([ // postテーブルにいれる
            'user_id' => Auth::id(), 
            'post' => $request->post, 
            
        ]);
        
        return back(); // リクエスト送ったページに戻る（つまり、/timelineにリダイレクトする）
    }
    
    public function show(Request $request)
    {
        //クリックした投稿のID
        $post = Post::find($request->id);
        //１つの投稿を表示する際それについてるコメントを表示
        $comments = Comment::where('post_id',$post)->latest()->get();
      
        return view('auth.postdetail', compact(
            'post',
            'comments'
            ));
    }
}
