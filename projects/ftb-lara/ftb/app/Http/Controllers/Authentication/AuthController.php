<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;

class AuthController
{
    //
    public function login(){
        return view('authentications.login');
    }
}
