<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Http\Controllers\post\PostController;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function post()
    {
        return app(PostController::class);
    }
    public function view()
    {
        $post = $this->post()->findAll();
        return view('devblog.blog', compact(['post']));
    }
    public function about()
    {
        return view('devblog.about');
    }
    public function contact()
    {
        return view('devblog.contact');
    }
    public function single()
    {
        return view('devblog.single');
    }
    public function work()
    {
        return view('devblog.work');
    }
}
