<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    protected $fillable = [
        'home_title',
        'alamat',
        'alamat_title',
        'whatsapp',
        'whatsapp_title',
        'tokopedia',
        'tokopedia_title',
        'shopee',
        'shopee_title',
        'instagram',
        'instagram_title',
        'twiter',
        'twiter_title',
        'other'
    ];

    protected $hidden = [];
}
