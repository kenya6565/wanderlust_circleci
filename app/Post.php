<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = [   // <---　追加
        'user_id', 'post',
    ];
}
