<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'tags', 'pic', 'long_description', 'short_description', 'user_id',
    ];
}
