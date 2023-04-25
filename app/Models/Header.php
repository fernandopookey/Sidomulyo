<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = [
        'logo',
        'phone_number',
        'facebook_title',
        'facebook_link',
        'twiter_title',
        'twiter_link',
        'instagram_title',
        'instagram_link',
    ];

    protected $hidden = [];
}
