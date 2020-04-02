<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends BaseEntitiy
{
    public function profile()
    {
        $post = $this->postController()->findAll();
        return view('panel2.profile', compact(['post']));
    }}
