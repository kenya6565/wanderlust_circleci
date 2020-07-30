<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use \App\Post;
use \App\PostPhoto;
use \App\Comment;
use \App\User;

class TimelineController extends Controller
{
   public function index(Request $request)
   {
      
        $all_posts = Post::orderBy('created_at','DESC')->paginate(9);
      
        return view('guest.timeline.index',compact(
            'all_posts'
        ));
   }
   
   public function show(Request $request)
    {
        //クリックした投稿のID
        $post = Post::find($request->id);
        $images = $post->photos;
         //dd($images);
       
        //$images = \Image::make($images);
        
        //dd($images);
        //１つの投稿を表示する際それについてるコメントを表示
        $comments = Comment::where('post_id',$post)->latest()->get();
       
        return view('guest.timeline.detail', compact(
            'post',
            'comments',
            'images'
        ));
    }
}
