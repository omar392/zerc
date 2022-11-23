<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seo::create([
            'url' => 'www.test.com',
            'title_ar' => 'title_ar',
            'title_en' => 'title_en',
            'key_ar' => 'key_ar',
            'key_en' => 'key_en',
            'description_ar' => 'description_ar',
            'description_en' => 'description_en',
        ]);
    }
}
