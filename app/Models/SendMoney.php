<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SendMoney extends Model
{
    protected $fillable = [
        'user_id',
        'recipient_name',
        'recipient_email',
        'recipient_country',
        'account_number',
        'amount_usd',
        'transaction_fee',
        'final_amount',
        'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
