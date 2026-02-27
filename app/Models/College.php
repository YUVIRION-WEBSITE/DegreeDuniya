<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class College extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'name',
        'slug',
        'description',
        'tagline',
        'facilities',
        'logo_path',
    ];

    protected $casts = [
        'facilities' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($college) {
            $college->slug = Str::slug($college->name);
        });

        static::updating(function ($college) {
            if ($college->isDirty('name')) {
                $college->slug = Str::slug($college->name);
            }
        });
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}