<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $fillable = [
        'photos', 'product_id'
    ];

    protected $hidden = [];

    // protected $foreignkey = 'product_id';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}