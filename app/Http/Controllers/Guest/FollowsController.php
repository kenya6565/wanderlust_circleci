<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\User;

class FollowsController extends Controller
{
    public function showFollowings($id)
    {
        $following_users = User::find($id)->followings()->paginate(9);
        return view('guest.follow.followings',compact(
            'following_users'
        ));
    }

    public function showFollowers($id)
    {
        $followers = User::find($id)->followers()->paginate(9);
        return view('guest.follow.followers', compact(
            'followers'
        ));
    }
}
