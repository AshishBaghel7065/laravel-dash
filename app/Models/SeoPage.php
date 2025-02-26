<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    use HasFactory;

    protected $table = 'seopages'; // Table name

    protected $fillable = [
        'seopage',
        'title',
        'meta_description',
        'meta_keywords',
        'author',
    ];
}
