<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class ResetPasswordController
{
    public function showResetForm(Request $request)
    
    {
        $email = $request->query('email');
        $token = $request->query('token');

        return view('pages.backend.admin.auth.reset-password', compact('email', 'token'));
    }
    
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:4|confirmed',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !$user->validateResetPasswordToken($request->token)) {
            return back()->withErrors(['token' => 'Invalid or expired token.']);
        }
    
        $user->password = $request->password;
        $user->clearResetPasswordToken();
        $user->save();
    
        return redirect()->route('login')->with('success', 'Password reset successful. You can now log in.');
    }
}
