<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoShowcase extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge',
        'title',
        'description',
        'youtube_embed_url',
    ];
}
