<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function view()
    {
        return view('panel2.page.auth.forget');
    }
}