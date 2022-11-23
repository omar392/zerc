<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(LaratrustSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SeoSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(CounterSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(CoverSeeder::class);
        \App\Models\Faq::factory(50)->create();
        \App\Models\Blog::factory(50)->create();
        \App\Models\News::factory(50)->create();
        \App\Models\Employment::factory(50)->create();
        \App\Models\Gallery::factory(50)->create();
        \App\Models\Service::factory(6)->create();
        \App\Models\Partner::factory(9)->create();
    }
}