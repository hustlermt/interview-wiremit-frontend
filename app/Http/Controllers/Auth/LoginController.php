<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Advert;
use Illuminate\Support\Facades\Auth;
use App\Models\SendMoney;
use App\Models\User;
class LoginController
{
    public function login()
    {

        if (Auth::check()) {
            return redirect('/dashboard');
        }

        return view('pages.backend.admin.auth.login');
    }

    public function admin()
    {
        $user = Auth::user();
        $adverts = Advert::all() ?? collect();
        if ($user->role === 'admin') {
            $adverts = Advert::latest()->take(3)->get();
            $transactions = SendMoney::latest()->get(); 
            $stats = [
                'today_usd'     => SendMoney::whereDate('created_at', now())->sum('amount_usd'),
                'users_count'   => User::count(),
                'adverts_count' => Advert::count(),
                'tx_count'      => SendMoney::count(),
            ];
        } else {
            $transactions = SendMoney::where('user_id', $user->id)->latest()->get();
            $stats = [
                'today_usd'     => SendMoney::where('user_id', $user->id)->whereDate('created_at', now())->sum('amount_usd'),
                'users_count'   => null,
                'adverts_count' => 0,
                'tx_count'      => SendMoney::where('user_id', $user->id)->count(),
            ];
        }

        return view('pages.backend.admin.admin', compact('transactions', 'stats', 'user','adverts'));
    }


    public function authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->route('admin');
        }

        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->with('error', 'Invalid login credentials.');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
