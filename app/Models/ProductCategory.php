<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_category'; // Define table name if different from default

    protected $fillable = ['category_title']; // Allow mass assignment for category_title
}
