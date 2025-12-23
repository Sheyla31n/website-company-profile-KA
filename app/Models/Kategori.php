<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Kategori extends Model
{
    protected $table = 'course_categories';

    protected $fillable = ['name', 'icon'];

    protected static function booted()
    {
        static::creating(function () {
            if (self::count() >= 5) {
                throw ValidationException::withMessages([
                    'icon' => 'Jumlah kategori maksimal 5'
                ]);
            }
        });
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id');
    }
}
