<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController
{
    protected $request;
    protected $model;
    public function __construct(Request $request, Post $post)
    {
        $this->request = $request;
        $this->model = $post;
    }
    public function validator($validator)
    {
        $value = [
            'title'    =>  'required',
            'description'  =>  'required',
        ];
        return Validator::make($validator, $value);
    }

    public function getList()
    {
        $post = $this->model->all();
        return view('panel2.page.list-post', compact(['post']));
    }
    public function getLists($post)
    {
        $post = $this->model->find($post);
        return $post;
    }
    public function getAdd()
    {
        return view('panel2.page.add-post');
    }

    public function getPosts()
    {

    }
    public function getPost($post)
    {

    }
    public function postPost()
    {
        $validator = $this->validator($this->request->all());
        if ($validator->fails()){
            return response($validator->errors()->first(), 423);
        }
        $this->model->create($this->request->all());
        return response('ok all thing', 200);
    }
}
