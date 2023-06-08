<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'additional_info',
        'price',
        'slug',
        'categories_id',
    ];

    protected $hidden = [];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function categories()
    {
        return $this->belongsTo(ProductCategory::class, 'categories_id', 'id');
    }

    public function related_products()
    {
        return $this->hasMany('App\Models\Product', 'categories_id', 'categories_id');
    }

    public function ratings()
    {
        return $this->belongsTo(Rating::class, 'product_id', 'id');
    }
}
