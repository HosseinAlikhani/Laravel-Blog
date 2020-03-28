<?php

namespace App\Http\Controllers;


class BlogController extends Controller
{
    public function home()
    {
        return view('blog.home');
    }
    public function post()
    {
        return app(PostController::class);
    }
    public function blog()
    {
        $post = $this->post()->findAll();
        $comment = $this->commentController()->findAll();
        return view('devblog.blog', compact(['post', 'comment']));
    }
    public function single($id)
    {
        $post = $this->post()->findOne($id);
        if (!empty($post)){
            $comment = $this->commentController()->findAll();
            return view('devblog.single', compact(['post', 'comment']));
        }else{
            abort(404);
        }
    }
    public function about()
    {
        return view('devblog.about');
    }
    public function contact()
    {
        return view('devblog.contact');
    }

    public function work()
    {
        return view('devblog.work');
    }
}
