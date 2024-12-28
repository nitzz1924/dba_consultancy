<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'userid',
        'serviceid',
        'transactionid',
        'amount',
        'paymenttype',
        'transactiontype',
        'transactiondata',
        'parentreferid',
        'commissionamt',
        'status',
    ];
}
