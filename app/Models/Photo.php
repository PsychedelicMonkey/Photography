<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'image', 'caption', 'width', 'height',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
