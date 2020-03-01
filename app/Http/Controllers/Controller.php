<?php

namespace App\Http\Controllers;

use App\Http\Controllers\role\PermissionController;

class Controller{

    public function profile()
    {
        return view('panel2.home');
    }

    public function permissionController()
    {
        return app(PermissionController::class);
    }
}
