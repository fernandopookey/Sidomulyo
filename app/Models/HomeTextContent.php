<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeTextContent extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    protected $hidden = [];
}
