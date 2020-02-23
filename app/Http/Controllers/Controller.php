<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function blog()
    {
        return view('blog.page.home');
    }
    public function contactUs()
    {
        return view('page.contact');
    }
    public function post()
    {
        return view('page.post');
    }
    public function postNoSidebar()
    {
        return view('page.post_nosidebar');
    }
    public function category()
    {
        return view('page.category');
    }
    public function regular()
    {
        return view('page.regular');
    }

    public function panel()
    {
        return view('panel.index');
    }
}
