<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appearance\Carousel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AppearanceSeeder::class,
            ConfigSeeder::class,
            SubjectSeeder::class,
            CarouselSeeder::class,
            HomeMenuSeeder::class,
            UserSeeder::class,
        ]);
    }
}
