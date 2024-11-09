<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingDetail extends Model
{
    protected $fillable = [
        'servicetype',
        'serviceid',
        'price',
        'disprice',
        'duration',
        'coverimage',
        'documents',
        'details',
        'notereq',
    ];
}
