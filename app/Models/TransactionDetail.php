<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = "transaction_details";
    protected $fillable = [
        'transaction_id',
        'products_id',
        'price',
        'code',
        'qty'
    ];

    protected $hidden = [];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    // public function products(): BelongsTo
    // {
    //     return $this->belongsTo(Product::class, 'product_id', 'id');
    // }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'transaction_id');
    }
}
