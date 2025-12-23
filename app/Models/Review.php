<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Review extends Model
{
    protected $fillable = ['name', 'stars', 'content'];

    protected static function booted()
    {
        static::creating(function () {
            if (Review::count() >= 3) {
                throw ValidationException::withMessages([
                    'review' => 'Review hanya boleh 3 data.'
                ]);
            }
        });

        static::saving(function ($review) {
            if ($review->stars < 1 || $review->stars > 5) {
                throw ValidationException::withMessages([
                    'stars' => 'Stars must be between 1 and 5.'
                ]);
            }
        });
    }
}

