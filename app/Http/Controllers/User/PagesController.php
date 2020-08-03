<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use App\Library\BaseClass;
use \App\User;
use \App\Post;
use \App\Follow;
use Hash;

class PagesController extends Controller
{
    
    public function show(Request $request)
    {
        $user_info = User::find($request->id);
        //dd($user_info);
        $counts = BaseClass::counts($user_info);
        $posts = Post::where('user_id',$request->id)->orderBy('created_at','DESC')->paginate(9);
      
        return view('user.users.index',compact(
            'posts',
            'user_info',
            'counts'
            
        ));
    }
    
    public function edit(Request $request)
    {
        $login_user = Auth::user();
        if (empty($login_user)) { //aaaaaは単なるパラメーター、News::findによってニューステーブルの特定の情報１行（bodyとか名前とか）を＄newsに入れてる
            abort(404);
        }
        return view('user.users.edit',compact(
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
