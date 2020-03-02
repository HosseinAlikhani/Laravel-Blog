<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\BaseEntitiy;
use App\Http\Requests\auth\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseEntitiy
{
    protected $request;
    public function __construct(LoginRequest $request,User $user)
    {
        $this->model = $user;
        $this->request = $request;
    }

    public function view()
    {
        return view('panel2.page.auth.login');
    }
    public function login()
    {
        dd(Auth::check());
    }
}
