<?php

namespace App\Model;


class Comment extends BaseModel
{

    public function user()
    {
        return $this->hasOne(User::class,
            'id',
            'user_id');
    }
    public function commentReply()
    {
        return $this->hasMany(CommentReply::class,
            'comment_id',
            'id');
    }
}
