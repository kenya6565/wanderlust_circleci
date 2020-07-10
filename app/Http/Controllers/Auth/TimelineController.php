<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\Post;

class TimelineController extends Controller
{
    
   public function showTimelinePage(Request $request)
   {
       $user = Auth::id();
       $posts = Post::where('user_id',$user)->latest()->get();
       return view('auth.timeline', compact('posts'));
       
   }
   
   public function post(Request $request)
   {
        $validator = $request->validate([ 
            'post' => ['required', 'string', 'max:140'], 
        ]);
        Post::create([ // postテーブルにいれる
            'user_id' => Auth::id(), // Auth::user()は、現在ログインしている人（つまりツイートしたユーザー）
            'post' => $request->post, // ツイート内容
            
        ]);
        
        return back(); // リクエスト送ったページに戻る（つまり、/timelineにリダイレクトする）
    }
    
    public function postDetail($id)
    {
        $post = Post::find($id);
        return view('auth.postdetail', compact('post'));
    }
}
