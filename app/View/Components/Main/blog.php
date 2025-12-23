<?php

namespace App\View\Components\Main;

use App\Models\Article;
use Illuminate\View\Component;
use Illuminate\Http\Request;

class Blog extends Component
{
    public $articles;

    public function __construct()
    {
        $this->articles = Article::latest()->paginate(10);
    }

    public function render()
    {
        return view('components.main.blog');
    }
}
