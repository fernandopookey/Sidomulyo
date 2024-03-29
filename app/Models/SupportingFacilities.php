<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportingFacilities extends Model
{
    protected $fillable = [
        'name',
        'photos'
    ];

    protected $hidden = [];
}