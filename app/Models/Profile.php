<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'visi',
        'misi',
        'proper',
        'description',
        'photos',
        'document'
    ];

    protected $hidden = [];
}
