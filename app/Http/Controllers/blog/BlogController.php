<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function view()
    {
        return view('devblog.blog');
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
