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

    public function getPosts()
    {
        $post = $this->model->all();
        return view('panel2.page.list-post', compact(['post']));
    }
    public function getPost(Post $post)
    {
        return view('panel2.page.edit-post', compact(['post']));
    }
    public function addPost()
    {
        return view('panel2.page.add-post');
    }
    public function postPost()
    {
        dd($this->request);
        $validator = $this->validator($this->request->all());
        if ($validator->fails()){
            return response($validator->errors()->first(), 423);
        }
        $data = $this->request->all();
        unset($data['image']);
        unset($data['tag']);
        $this->model->create($data);
        return response('ok all thing', 200);
    }
    public function patchPost()
    {
        dd($this->request);
    }
    public function deletePost()
    {
        if ($this->model->destroy($this->request->post_id)) {
            return response('delete post ' . $this->request->post_id . ' successfully',200);
        }else{
            return response('error when delete post ' . $this->request->post_id . ' please Trt Again Later!!!',423);
        }
    }
}
