<?php

namespace App\Model;


class Post extends BaseModel
{
    protected $fillable = [
        'title', 'tags', 'pic', 'long_description', 'short_description', 'user_id',
    ];
}
