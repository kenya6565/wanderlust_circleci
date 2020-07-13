<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\User;
use \App\Post;

class MypageController extends Controller
{
    
    public function showMyPage (Request $request)
    {
        $login_user_id = Auth::id();
        $posts = Post::where('user_id',$login_user_id)->latest()->get();
        return view('auth.mypage',compact(
            'posts',
            'login_user_id'
        ));
    }
    
    public function editMyPage (Request $request)
    {
        $login_user = Auth::user();
        
        if (empty($login_user))
        { //aaaaaは単なるパラメーター、News::findによってニューステーブルの特定の情報１行（bodyとか名前とか）を＄newsに入れてる
            abort(404);
        }
        
        return view('auth.editmypage',compact(
            'login_user'
        ));
    }
    
    public function updateMyPage (Request $request)
    {
        $this->validate($request, User::$rules);
        
        $login_user = Auth::user();
        $updated_user_info = $request->all(); //all関数
        $login_user->fill($updated_user_info)->save();
        
        return redirect(route('mypage', ['id'=>Auth::id()]));
    }
}
