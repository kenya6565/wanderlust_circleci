<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [   
        'user_id', 
        'post',
        'image'
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
    }
}
