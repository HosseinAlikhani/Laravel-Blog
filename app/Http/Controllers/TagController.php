<?php

namespace App\Http\Controllers;

use App\Model\Tag;
use Illuminate\Http\Request;

class TagController extends BaseEntitiy
{
    public function __construct(Request $request, Tag $tag)
    {
        $this->request = $request;
        $this->model = $tag;
    }
}
