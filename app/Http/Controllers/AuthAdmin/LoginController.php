<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    
    protected $redirectTo = '/admins/mypage'; //ログイン後の遷移先
    
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout'); //ミドルウェアの変更
    }
    
    public function showLoginForm()
    {
        return view('admin_auth.login'); //ログインページ
    }
    
    protected function guard()
    {
        return Auth::guard('admin'); //先生用のguardに変更
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect('/admins/login'); //ログアウト後の遷移先
    }
}

