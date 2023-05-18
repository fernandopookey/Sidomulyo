<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // use HasFactory;
    // protected $table = 'transactions';

    protected $fillable = [
        'users_id',
        'name',
        'phone_number',
        'address',
        'note',
        'transaction_status',
        'total_price',
        'code'
    ];

    protected $hidden = [];

    public function transactiondetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}