<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferIncome extends Model
{
    protected $fillable = [
        'incomename',
        'criteria',
        'amount',
        'lessthangreater',
        'status',
    ];
}
