<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
    protected $fillable = [
        'transaction_id',
        'user_id',
        'bank',
        'name',
        'account_number',
        'account_name',
        'code',
        'photos',
        'total'
    ];

    protected $hidden = [];

    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }
}
