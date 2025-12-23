<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;//
    protected $fillable = ['title','thumbnail','content'];

    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->content), 20);
    }
}
