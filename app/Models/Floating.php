<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floating extends Model
{
    protected $fillable = [
        'photos',
        'name',
        'link',
    ];

    protected $hidden = [];
}
