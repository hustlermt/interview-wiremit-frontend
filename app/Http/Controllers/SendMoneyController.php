<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SendMoney;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SendMoneyController extends Controller
{
    public function create()
    {
        return view('pages.backend.admin.send-money');
    }
    
    public function payments()
    {
        $user = Auth::user();

        if ($user->role === 'general') {
           
            $transactions = SendMoney::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            
            $transactions = SendMoney::orderBy('created_at', 'desc')->get();
        }

        return view('pages.backend.admin.transactions', compact('transactions', 'user'));
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'recipient_country' => 'required|in:GBP,ZAR',
            'recipient_name'    => 'required|string|max:255',
            'recipient_email'   => 'nullable|email|max:255',
            'account_number'    => 'required|digits:10',
            'amount_usd'        => 'required|numeric|min:5|max:500',
            'transaction_fee'   => 'required|numeric|min:0',
            'final_amount'      => 'required|numeric|min:0',
            'payment_method'    => 'required|in:bank,mobile,card',
        ]);

        try {
            
            SendMoney::create([
                'user_id'           => Auth::id(),
                'recipient_name'    => $request->recipient_name,
                'recipient_email'   => $request->recipient_email,
                'recipient_country' => $request->recipient_country,
                'account_number'    => $request->account_number,
                'amount_usd'        => $request->amount_usd,
                'transaction_fee'   => $request->transaction_fee,
                'final_amount'      => $request->final_amount,
                'payment_method'    => $request->payment_method,
            ]);

           
            return back()->with('success', 'Money sent successfully!');
 
        } catch (\Exception $e) {
            Log::error('Send Money Error:', [
                'message' => $e->getMessage(),
                'request' => $request->all()
            ]);
            return back()->with('error', 'Failed to send money: ');
        }
    }
}
