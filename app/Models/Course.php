<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use App\Models\Kategori;

class Course extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'category_id',
    ];

    /* ================= RELATION ================= */

    public function category()
    {
        return $this->belongsTo(Kategori::class, 'category_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}


