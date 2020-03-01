<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\BaseEntitiy;

class LoginController extends BaseEntitiy
{
    public function view()
    {
        return view('panel2.page.auth.login');
    }
}
