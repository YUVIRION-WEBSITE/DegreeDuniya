<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'photo_path',
        'comment',
        'rating',
    ];

    protected $casts = [
        'date' => 'date',
        'rating' => 'integer',
    ];
}