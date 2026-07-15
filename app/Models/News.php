<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'youtube_url',
        'category',
        'image_url',
        'views_count',
        'content',
        'summary',
        'published_date',
    ];

    public function getSummaryAttribute($value)
    {
        if (!empty($value)) {
            return $value;
        }
        return \Illuminate\Support\Str::limit(strip_tags($this->content), 150);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'published_date' => 'date',
        ];
    }
}
