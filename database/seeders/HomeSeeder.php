<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeSlider;

class HomeSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            HomeSlider::firstOrCreate(
                ['id' => $i],
                ['image' => null]
            );
        }
    }
}
