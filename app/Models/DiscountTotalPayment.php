<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountTotalPayment extends Model
{
    protected $fillable = [
        'total_payment',
        'discount'
    ];

    protected $hidden = [];
}
