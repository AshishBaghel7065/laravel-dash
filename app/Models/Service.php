<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows the default naming convention)
    protected $table = 'services';

    // Specify the fillable attributes for mass assignment
    protected $fillable = ['service', 'image', 'category', 'description' ,'active'];


    // You can also specify hidden fields if you don't want them to appear in arrays or JSON responses
    protected $hidden = [];

    // Optional: Define timestamps if your table doesn't have them (default is true)
    public $timestamps = true;
}
