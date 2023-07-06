<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_confirmation_id',
        'user_id',
        'bank_id'
    ];

    protected $hidden = [];

    // public function transactions()
    // {
    //     return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    // }

    // public function bank()
    // {
    //     return $this->belongsTo(Bank::class, 'bank_id', 'id');
    // }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
