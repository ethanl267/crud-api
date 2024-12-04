<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Define the fillable fields (columns that can be mass-assigned)
    protected $fillable = [
        'title',
        'description',
    ];
}

