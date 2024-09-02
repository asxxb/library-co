<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $appends = ['image_url'];
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'slug'

    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function getImageUrlAttribute()
    {
        return url($this->image);
    }
}
