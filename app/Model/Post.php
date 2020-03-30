<?php

namespace App\Model;


class Post extends BaseModel
{
    public function comment()
    {
        return $this->hasMany(Comment::class,
            'post_id',
            'id');
    }
    public function user()
    {
        return $this->hasOne(User::class,
            'id',
            'user_id');
    }
}
