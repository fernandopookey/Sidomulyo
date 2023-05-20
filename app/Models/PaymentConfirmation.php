<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
    protected $fillable = [
        'transaction_id',
        'user_id',
        'name',
        'bank',
        'account_number',
        'account_name',
        'code',
        'total',
        'photos',
    ];

    protected $hidden = [];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }
}
