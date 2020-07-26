<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers;
use App\Library\BaseClass;
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
       // もしログインユーザが誰かをフォローしていたならforeachでフォローしてるユーザ１つ１つの投稿を取得
        $user_id = [Auth::id()];
        if(count(Auth::user()->followings) > 0)
        {
            $following_users = Auth::user()->followings;
            foreach($following_users as $following_user){
                //フォローしてるユーザーのID＋ログインユーザのID
                array_push($user_id,$following_user->id);
            }
        }
        //postsテーブルのユーザID(投稿ユーザ)にフォローしてるユーザのIDかログインユーザのIDがあったら取得
        $all_posts = Post::whereIn('user_id',$user_id)
                           ->orderBy('created_at','DESC')
                           ->paginate(9);
                
        return view('user.timeline.index',compact(
            'all_posts'
        ));
        
   }
   public function edit($id)
    {
        //dd($id);
        
        $edit_post = Post::find($id);
        //dd($edit_post);
       
       
        return view('user.timeline.edit',compact(
            'edit_post'
        ));
    }
    public function update(Request $request)
    {
        $this->validate($request, Post::$rules);
        $post= Post::find($request->id);
        $updated_post = $request->all(); 
        //dd($updated_post);
        $post->fill($updated_post)->save();
        
        return redirect('/timeline'); 
    
    }
   
   public function post(Request $request)
   {
        //dd($request);
        $this->validate($request, Post::$rules);
        //dd($request);
        if($request->hasFile('image')){
            $request->file('image')->store('/public/images');
            Post::create([ 
                'user_id' => Auth::id(), 
                'title' => $request->title, 
                'post' => $request->post, 
                'image' => $request->file('image')->hashName(),
            ]);
         
        }else{
            Post::create([ 
                'user_id' => Auth::id(), 
                'title' => $request->title, 
                'post' => $request->post, 
            ]);
           
        }
        return redirect('/timeline'); 
    }
    
    public function show(Request $request)
    {
        //クリックした投稿のID
        $post = Post::find($request->id);
        //dd($post);
        //１つの投稿を表示する際それについてるコメントを表示
        $comments = Comment::where('post_id',$post)->latest()->get();
      
        return view('user.timeline.detail', compact(
            'post',
            'comments'
        ));
    }
    
    public function delete(Request $request)
    {
        Post::find($request->id)->delete();
        
        return redirect('/timeline'); 
    }



    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        //dd($keyword);
        if (!empty($keyword)) {
            $searched_users = User::where('name', $keyword)->get();
            $searched_posts = Post::where('post', $keyword)->get();
                
        }
 
        return view('user.timeline.search', compact(
            'keyword', 
            'searched_users', 
            'searched_posts'
        ));
    }
}
