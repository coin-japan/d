<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'instagram_photo_id', 
        'thumbnail_url', 
        'low_resolution_url', 
        'standard_resolution_url', 
        'is_hidden',
        'is_deleted'
    ];
}
