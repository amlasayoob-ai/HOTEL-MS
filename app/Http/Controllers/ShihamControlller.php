<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShihamControlller extends Controller
{
    public function apppage()
    {
        return view('app');
    }

    public function userReg()
    {
        return view('user-register');
    }
}
