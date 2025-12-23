<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\HomeSlider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
   public function boot(): void
    {
        view()->composer('main.home', function ($view) {
            $view->with(
                'home_sliders',
                HomeSlider::orderBy('id')->take(3)->get()
            );
        });
    }
}
