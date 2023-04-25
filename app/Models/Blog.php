<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'name',
        'author',
        'description',
        'slug',
        'photos'
    ];

    // protected $guarded;

    protected $hidden = [];
}