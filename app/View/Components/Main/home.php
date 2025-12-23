<?php

namespace App\View\Components\Main;

use App\Models\HomeSlider;
use Illuminate\View\Component;

class Home extends Component
{
    public $home_sliders;

    public function __construct()
    {
        $this->home_sliders = HomeSlider::orderBy('id')->get();
    }

    public function render()
    {
        return view('components.main.home');
    }
}