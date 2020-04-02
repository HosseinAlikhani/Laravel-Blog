<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCreate()
    {
        return view('panel2.page.post.add-category');
    }
    public function getList()
    {
        return view('panel2.page.post.list-category');
    }

    public function getUpdate()
    {
        return view('panel2.page.post.update-category');
    }
    public function postCreate()
    {

    }
}
