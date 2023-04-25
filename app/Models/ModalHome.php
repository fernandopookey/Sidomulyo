<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalHome extends Model
{
    protected $fillable = [
        'name',
        'description',
        'photos'
    ];

    protected $hidden = [];
}