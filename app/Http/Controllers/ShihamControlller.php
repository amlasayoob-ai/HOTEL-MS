<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShihamControlller extends Controller
{
    /**
     * After login /app route
     */
    public function apppage()
    {
        // Show dashboard page
        return view('layouts.dashboard');
    }

    /**
     * User registration page
     */
    public function userReg()
    {
        return view('user-register');
    }
}
