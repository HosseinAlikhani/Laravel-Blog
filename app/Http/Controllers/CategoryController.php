<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCreate()
    {
        $tags = $this->tagController()->findAll();
        return view('panel2.page.post.add-category', compact(['tags']));
    }
    public function getList()
    {
        return view('panel2.page.post.list-category');
    }

    public function getUpdate()
    {
        return view('panel2.page.post.update-category');
    }
    public function postCreate(Request $request)
    {
        dd($request->all());
    }
}
