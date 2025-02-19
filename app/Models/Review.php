<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'reviews';

    // Define the fields that are mass assignable
    protected $fillable = [
        'username', 
        'posted_date', 
        'review', 
        'stars',
        'user_image'
    ];

    // Optionally, define custom date formats if needed
    protected $dates = ['posted_date'];

    // You can also define relationships here if needed
}
