<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {

    public function profile()
    {
        return view('panel2.home');
    }
}
