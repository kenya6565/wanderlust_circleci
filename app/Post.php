<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [   
        'user_id',
        'title',
        'post',
        'country'
    ];
    
    public static $rules = array(
        'post' => ['required', 'string', 'max:140'], 
    );
    
    public function User()
    {
         return $this->belongsTo('App\User');
     }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function liking_users()
    {
        //ある投稿に誰がいいねしてるか
        return $this->belongsToMany(User::class,'likes','post_id','user_id')->withTimestamps();
        //return $this->belongsToMany(User::class, 'users')->using(Like::class);
        // $users = [];
        // $likes = Like::where('post_id', $this->id)->get();
        // foreach($likes as $like) {
        //   $users[] = User::find($like->user_id);
        // }
        // dd( $users);
        // return $users;
    }
    
    public function photo()
    {
        return $this->hasMany('App\PostPhoto');
    }
}
