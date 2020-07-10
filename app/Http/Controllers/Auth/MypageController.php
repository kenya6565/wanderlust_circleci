<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\User;

class MypageController extends Controller
{
    
    public function showMyPage ($id)
    {
    
    return view('auth.mypage', compact('login_user'));
    
    }
}
