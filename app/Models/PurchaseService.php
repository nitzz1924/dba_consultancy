<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseService extends Model
{
    protected $fillable = [
        'formtype',
        'userid',
        'servicename',
        'serviceid',
        'discount',
        'servicecharge',
        'formdata',
        'status',
    ];
}
