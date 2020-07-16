<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\Post;
use \App\Comment;
use \App\User;

class TimelineController extends Controller
{
    
   public function index(Request $request)
   {
        //自分の投稿とフォローしてるユーザの投稿を取得してそれを作成日時順で表示
        $user_posts = Auth::user()->posts;
        //dd($user_posts);
        //もしログインユーザが誰かをフォローしていたならforeachでフォローしてるユーザ１つ１つの投稿を取得
    //     $following_users = Auth::user()->followings();
    //     dd($following_users);
    //     if($following_users !== null)
    //     {
    //         foreach($following_users as $following_user){
    //             $all_posts = $user_posts->merge($following_user->posts);
              
    //         }
        
    //     $all_posts = $all_posts->orderBy('created_at');
    //   dd($all_posts);
    //     return view('user.timeline.index',['all_posts' => $all_posts]);
    //     }else{
    //     //dd($all_posts);
       return view('user.timeline.index',['user_posts' => $user_posts]);
    //     }
   }
   
   public function post(Request $request)
   {
        $this->validate($request, Post::$rules);
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
      
        return view('user.timeline.detail', compact(
            'post',
            'comments'
        ));
    }
}
