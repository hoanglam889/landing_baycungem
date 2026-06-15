<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class TikTokVideo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tik_tok_videos';

    protected $fillable = [
        'tiktok_url',
        'local_video_path',
        'order',
    ];
}
