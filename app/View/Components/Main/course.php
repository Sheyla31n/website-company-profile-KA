<?php

namespace App\View\Components\Main;

use App\Models\Kategori;
use App\Models\Review;
use Illuminate\View\Component;

class Course extends Component
{
    public $course_categories;
    public $reviews;

    public function __construct()
    {
        $this->course_categories = Kategori::orderBy('id')->get();
        $this->reviews = Review::orderBy('id')->take(3)->get();
    }


    public function render()
    {
        return view('components.main.course');
    }
}
