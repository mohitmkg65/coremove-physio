<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'short_summary',
        'causes',
        'symptoms',
        'therapy_approach',
        'when_to_seek_care',
        'faqs',
        'image_url',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'faqs' => 'array',
        'is_featured' => 'boolean',
    ];
}
