<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'about_ar' => 'about_ar',
            'about_en' => 'about_en',
            'mission_ar' => 'mission_ar',
            'mission_en' => 'mission_en',
            'vision_ar' => 'vision_ar',
            'vision_en' => 'vision_en',
            'goals_ar' => 'goals_ar',
            'goals_en' => 'goals_en',
        ]);
    }
}
