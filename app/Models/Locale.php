<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $fillable = [
        'locale_index',
        'page_index',
        'section_index',
        'slug',
        'text'
    ];
}
