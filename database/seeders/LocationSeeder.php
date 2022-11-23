<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            '0' => '24.6438753',
            '1' => '46.7273219',

            '2' => 'شارع الريل مجمع الشايع <br> صناع الحلول الدولية',
            '3' => 'Riydah',
        ]);
    }
}
