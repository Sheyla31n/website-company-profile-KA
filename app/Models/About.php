<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class About extends Model
{
    protected $table = 'about_us';

    protected $fillable = ['description'];

    protected static function booted()
    {
        static::creating(function () {
            if (self::count() >= 1) {
                throw ValidationException::withMessages([
                    'description' => 'Jumlah deskripsi maksimal adalah 1.',
                ]);
            }
        });
    }
}
