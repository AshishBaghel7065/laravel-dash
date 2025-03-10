<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural of the model name
    protected $table = 'achievements';

    // Specify the fillable attributes
    protected $fillable = [
        'title', 'count',
    ];
}
