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

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'role'          => 'required|string|max:50',
            'address'       => 'required|string|max:255',
            'phone_number'  => 'required|digits_between:9,12',
        ]);


        $user->update([
            'name'         => $request->name,
            'email'        => $request->email,
            'role'         => $request->role,
            'address'      => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->back()->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function getTable()
    {
        $users = User::all();
        return view('admin.user-table', compact('users'));
    }
}
