<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'amount',
        'currency',
        'frequency',
        'status',
        'stripe_session_id',
        'stripe_payment_intent',
        'stripe_subscription_id',
    ];

    public function amountFormatted(): string
    {
        return '$'.number_format($this->amount / 100, 2).' '.strtoupper($this->currency);
    }
}
