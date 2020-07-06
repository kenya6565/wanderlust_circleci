<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\Post;

class TimelineController extends Controller
{
   public function showTimelinePage()
   {
       $posts = Post::latest()->get();
       return view('auth.timeline', compact('posts'));
   }
   
   public function post(Request $request)
    {
        $validator = $request->validate([ // これだけでバリデーションできるLaravelすごい！
            'post' => ['required', 'string', 'max:140'], // 必須・文字であること・280文字まで（ツイッターに合わせた）というバリデーションをします（ビューでも軽く説明します。）
        ]);
        Post::create([ // postテーブルにいれる
            'user_id' => Auth::id(), // Auth::user()は、現在ログインしている人（つまりツイートしたユーザー）
            'post' => $request->post, // ツイート内容
            
        ]);
        
        return back(); // リクエスト送ったページに戻る（つまり、/timelineにリダイレクトする）
    }
}
