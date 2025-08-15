<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function signup()
    {
        return view('pages.backend.admin.auth.signup');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name'         => 'required|string|max:255',
            'surname'      => 'required|string|max:255',
            'phone_number' => 'required|string|max:20|unique:users',
            'email'        => 'required|string|email|max:255|unique:users',
            'password'     => 'required|string|min:4',
        ]);


        $user = User::create([
            'name'         => $request->name,
            'surname'      => $request->surname,
            'phone_number' => $request->phone_number,
            'email'        => $request->email,
            'password'     => $request->password,
            'role'         => 'general',
        ]);

        if ($user) {

            return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
        } else {
            return redirect()->route('signup')->with('error', 'Failed to create account. Please try again.');
        }
    }
}
