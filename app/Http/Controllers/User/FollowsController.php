<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;

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
        $user = User::find($id);
        $followings = $user->followings();

        $data = [
            'user' => $user,
            'users' => $followings,
        ];
        //dd($data);
        $data += $this->counts($user);

        return view('user.follow.followings',compact(
            'data'
        ));
    }

    public function showFollowers($id)
    {
        $user = User::find($id);
        $followers = $user->followers();

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);
        //dd($data);
        return view('user.follow.followers', compact(
            'data'
        ));
    }
}
