<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
    protected $fillable = [
        'name',
        'bank',
        'account_number',
        'account_name',
        'photos',
    ];

    protected $hidden = [];
}
