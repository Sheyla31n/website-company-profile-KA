<?php

namespace App\View\Components\main;

use App\Models\About;
use App\Models\Partner;
use Illuminate\View\Component;

class AboutUss extends Component
{
    public $about_us;
    public $partners;

    public function __construct()
    {
        $this->about_us = About::first();
        $this->partners = Partner::all();
    }

    public function render()
    {
        return view('components.main.about-uss');
    }
}

