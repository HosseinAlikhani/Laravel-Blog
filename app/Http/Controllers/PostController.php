<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Model\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends BaseEntitiy
{
    protected $request;
    protected $model;
    public function __construct(PostRequest $request, Post $post)
    {
        $this->request = $request;
        $this->model = $post;
    }
    public function createVariable($data)
    {
        return [
            'title' =>  $data['title'],
            'user_id'   =>  1,
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
        $category = $this->categoryController()->findAll();
        $tag = $this->tagController()->findAll();
        return view('panel2.page.post.add-post', compact(['category', 'tag']));
    }
    public function postPost()
    {
        $model = $this->create($this->createVariable($this->request->all()));
        if ($model){
            return response([
                'message'   =>  $this->message('submitok'),
                'data'  =>  $model,
            ], 200);
        }else{
            return response()->json($this->message('submitno'));
        }

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
