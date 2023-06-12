<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'name',
        'author',
        'description',
        'source',
        'source_link',
        'slug',
        'photos'
    ];

    // protected $guarded;

    protected $hidden = [];

    public function comments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id', 'id');
    }
}
