<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityAndMachine extends Model
{
    protected $fillable = [
        'head',
        'description'
    ];

    protected $hidden = [];
}