<?php

namespace App\Model;


class CommentReply extends BaseModel
{
    public function user()
    {
        return $this->hasOne(User::class,
            'id',
            'user_id');
    }
}
