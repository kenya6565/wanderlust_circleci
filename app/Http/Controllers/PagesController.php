<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\User;
use \App\Post;
use Hash;

class PagesController extends Controller
{
    
    public function show(Request $request)
    {
        $login_user_id = Auth::id();
        $posts = Post::where('user_id',$login_user_id)->latest()->get();
        return view('auth.mypage',compact(
            'posts',
            'login_user_id'
        ));
    }
    
    public function edit(Request $request)
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
    
    public function update(Request $request)
    {
        
         //現在のパスワードが正しいかを調べる
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
        }

        //現在のパスワードと新しいパスワードが違っているかを調べる
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        //バリデーション
        $this->validate($request, User::$rules);
        $login_user = Auth::user();
        $updated_user_info = $request->all(); 
        $login_user->password = bcrypt($request->get('new-password'));
        $login_user->fill($updated_user_info)->save();
        
        return redirect(route('mypage', ['id'=>Auth::id()]));
    }
}
