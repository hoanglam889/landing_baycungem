<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image_url',
        'badge',
        'title',
        'content',
        'description',
        'price',
        'views_count',
        'detail_url',
        'order',
    ];

    public function getDescriptionAttribute($value)
    {
        if (!empty($value)) {
            return $value;
        }
        return \Illuminate\Support\Str::limit(strip_tags($this->content), 150);
    }
}
