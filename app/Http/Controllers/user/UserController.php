<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\BaseEntitiy;
use App\User;
use Illuminate\Http\Request;

class UserController extends BaseEntitiy
{
    protected $request;
    public function __construct(Request $request, User $user)
    {
        $this->request = $request;
        $this->model = $user;
    }

    public function getUsers()
    {
        return $this->findAll();
    }
    public function getUser(User $user)
    {
        return $user;
    }
}
