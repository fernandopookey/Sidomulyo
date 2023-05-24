<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FourthFloating extends Model
{
    protected $fillable = [
        'photos',
        'name',
        'link',
    ];

    protected $hidden = [];
}
