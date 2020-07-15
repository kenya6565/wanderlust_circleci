<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public static $rules = array(
        'name' => 'required',
        'email' => 'required',
        'current-password' => 'required',
        'new-password' => 'required|string|min:8|confirmed',
        //バリデーションのルール設定
    );
    
    public function posts()
    {
         return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    //あるユーザのフォロー中のユーザを取得する
    public function follows()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_id')->withTimestamps();
    }
    //あるユーザのフォロワーとなっているユーザ を取得する
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'user_id')->withTimestamps();
    }

    public function is_following($userId)
    {
        return $this->follows()->where('following_id', $userId)->exists();
    }
    
    public function follow($userId)
    {
        // すでにフォロー済みではないか？
        $existing = $this->is_following($userId);
        // フォローする相手がユーザ自身ではないか？
        $myself = $this->id == $userId;
    
        // フォロー済みではない、かつフォロー相手がユーザ自身ではない場合、フォロー
        if (!$existing && !$myself) {
            $this->follows()->attach($userId);
        }
    }
    
    public function unfollow($userId)
    {
        // すでにフォロー済みではないか？
        $existing = $this->is_following($userId);
        // フォローする相手がユーザ自身ではないか？
        $myself = $this->id == $userId;
    
        // すでにフォロー済みならば、フォローを外す
        if ($existing && !$myself) {
            $this->follows()->detach($userId);
        }
    }
}
