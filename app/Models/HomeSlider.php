<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class HomeSlider extends Model
{
    protected $table = 'home_sliders';

    protected $fillable = ['image'];

    protected static function booted()
    {
        static::creating(function () {
            if (self::count() >= 3) {
                throw ValidationException::withMessages([
                    'image' => 'Jumlah Home Slider maksimal 3'
                ]);
            }
        });
    }
}
