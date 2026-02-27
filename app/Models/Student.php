<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name',
        'email',
        'phone',
        'address',
        'photo_path',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}