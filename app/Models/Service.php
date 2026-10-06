<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'short_description',
        'full_description',
        'benefit',
        'icon',
        'image_url',
        'sort_order',
    ];
}
