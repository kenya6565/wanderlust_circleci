<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\User;
use \App\Post;

class MypageController extends Controller
{
    
    public function showMyPage (Request $request)
    {
        $login_user_id = $request->id;
        $posts = Post::where('user_id',$login_user_id)->latest()->get();
        return view('auth.mypage',compact(
            'posts'
            ));
    
    }
}
