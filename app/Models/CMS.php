<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CMS extends Model
{
    use HasFactory;

    protected $table = 'cms';

    protected $fillable = [
        'title',
        'slug',
        'type',
        'content',
        'image_path',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cms) {
            $cms->slug = Str::slug($cms->title);
        });

        static::updating(function ($cms) {
            if ($cms->isDirty('title')) {
                $cms->slug = Str::slug($cms->title);
            }
        });
    }
}