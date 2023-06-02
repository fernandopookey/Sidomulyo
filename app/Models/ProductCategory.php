<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'name',
        'photos',
        'slug',
    ];

    protected $hidden = [];

    // public function product()
    // {
    //     return $this->hasMany(Product::class);
    // }

    // // this is a recommended way to declare event handlers
    // protected static function booted()
    // {
    //     static::deleting(function (ProductCategory $productCategory) { // before delete() method call this
    //         $productCategory->product()->delete();
    //         // do the rest of the cleanup...
    //     });
    // }
}