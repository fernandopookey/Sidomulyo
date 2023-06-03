<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    protected $hidden = [];
}
