<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'image',
        'description',
        'category',
        'publish',
        'active',
        'slug',
        'meta_keywords',
        'meta_description',
        'meta_tags'
    ];

    protected $casts = [
        'active' => 'boolean',
        'publish' => 'date',
        'meta_tags' => 'string', // Default value
    ];
}

?>
