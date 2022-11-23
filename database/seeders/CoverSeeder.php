<?php

namespace Database\Seeders;

use App\Models\Cover;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cover::create([
            'image_contact' => 'temp1.png',
            'image_offer' => 'temp2.png',
            'image_offer_single' => 'temp3.png',
            'image_gallery' => 'temp5.png',
            'image_about_3' => 'temp4.png',
            'image_about_2' => 'temp1.png',
            'image_blog' => 'temp1.png',
            'image_faqs_2' => 'temp2.png',
            'image_faqs' => 'temp3.png',
            'image_service' => 'temp4.png',
            'image_about' => 'temp5.png',
        ]);
    }
}