<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'phone',
        'email',
        'address',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'tiktok_url',
        'zalo_url',
        'show_phone_button',
        'show_zalo_button',
        'copyright',
    ];

    protected $casts = [
        'show_phone_button' => 'boolean',
        'show_zalo_button' => 'boolean',
    ];
}
