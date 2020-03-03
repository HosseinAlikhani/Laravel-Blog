<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\BaseEntitiy;
use App\Http\Requests\auth\LoginRequest;
use App\User;
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
        if ($this->attemp()){
            return $this->responseMessage(['message' => $this->message('loginok')],200);
        }else{
            return $this->responseMessage(['message' => $this->message('dataincorrect')], 422);
        }
    }

    public function attemp()
    {
        $validated = $this->request->validated();
        return Auth::attempt([
            'email' =>  $validated['username'],
            'password'  =>  $validated['password'],
        ]);
    }
}
