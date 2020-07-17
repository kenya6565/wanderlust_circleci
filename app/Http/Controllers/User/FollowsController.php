<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;
use \App\Auth;

class FollowsController extends Controller
{
    public function store($id)
    {
        \Auth::user()->follow($id);
        return back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfollow($id);
        return back();
    }
    
    
    //フォローしてるユーザー表示
     public function showFollowings($id)
    {
        
        $following_users = \Auth::user()->followings;
        //dd($following_users);

        return view('user.follow.followings',compact(
            'following_users'
        ));
    }

    public function showFollowers($id)
    {
        $followers = \Auth::user()->followers;
        //dd($following_users);

       
        //dd($data);
        return view('user.follow.followers', compact(
            'followers'
        ));
    }
}
