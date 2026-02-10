<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
            'address'      => 'required|string|max:255',
            'phone_number' => 'required|digits_between:9,12',
        ]);

        User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'address'      => $request->address,
            'phone_number' => $request->phone_number
        ]);

        return redirect()->route('login.form')
            ->with('success', 'Registered successfully! Please login.');
    }
}
