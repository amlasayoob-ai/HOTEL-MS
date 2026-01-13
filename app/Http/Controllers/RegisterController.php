<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{


    public function registerForm()
    {
        return view('register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
            'role'         => 'required|string|max:50',
            'address'      => 'required|string|max:255',
            'phone_number' => 'required|digits_between:9,12',
        ]);

        User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'role'         => $request->role,
            'address'      => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('login.form')
            ->with('success', 'Registered successfully! Please login.');
    }
}
