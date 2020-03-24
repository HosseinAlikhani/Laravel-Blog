<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseEntitiy;
use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends BaseEntitiy
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
            'long_description'  =>  'required',
            'tags'  =>  'required',
            'pic'   =>  'required',
        ];
        return Validator::make($validator, $value);
    }
    public function createVariable($data)
    {
        return [
            'title' =>  $data['title'],
            'user_id'   =>  1,
            'tags'  =>  $data['tags'],
            'pic'   =>  $this->uploadPic($this->request->pic),
            'long_description'  =>  $data['long_description'],
            'short_description' =>  'short_description',
        ];
    }
    public function getPosts()
    {
        $post = $this->findAll();
        return view('panel2.page.post.list-post', compact(['post']));
    }
    public function getPost(Post $post)
    {
        return view('panel2.page.post.edit-post', compact(['post']));
    }
    public function getPostPost()
    {
        return view('panel2.page.post.add-post');
    }
    public function postPost()
    {
        $validator = $this->validator($this->request->all());
        if ($validator->fails()){
            return response($validator->errors()->first(), 423);
        }

        $model = $this->create($this->createVariable($this->request->all()));
        return response([
            'message'   =>  'post create successfully',
            'data'  =>  $model,
        ], 200);
    }
    public function patchPost($post)
    {
        $validator = $this->validator($this->request->all());
        if ($validator->fails()){
            return response($validator->errors()->first(), 423);
        }

        $model = $this->update($post, $this->createVariable($this->request->all()));
        return response([
            'message'   =>  'post create successfully',
            'data'  =>  $model,
        ], 200);
    }
    public function deletePost()
    {
        if ($this->destroy($this->request->post_id)) {
            return response('delete post ' . $this->request->post_id . ' successfully',200);
        }else{
            return response('error when delete post ' . $this->request->post_id . ' please Trt Again Later!!!',423);
        }
    }

    public function uploadPic($pic)
    {
        $name = $pic->getClientOriginalName();
//        $name = pathinfo($name, PATHINFO_FILENAME);
        $format = $pic->getClientOriginalExtension();
        $dir = 'public/post';
        Storage::putFileAs($dir,$pic,$pic->getClientOriginalName());
        return '/storage/post/'.$name;
    }

}
