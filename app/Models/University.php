<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'vision',
        'mission',
        'logo_path',
        'location',
        'type',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($university) {
            $university->slug = Str::slug($university->name);
        });

        static::updating(function ($university) {
            if ($university->isDirty('name')) {
                $university->slug = Str::slug($university->name);
            }
        });
    }

    public function colleges()
    {
        return $this->hasMany(College::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }
}