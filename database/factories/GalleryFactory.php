<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Gallery::class;
    public function definition()
    {
        $filePath = public_path('dashboard/galleries');
        return [

            'image' => 'gallery.jpg',
            'description_ar' => $this->faker->sentences(3, true),
            'description_en' => $this->faker->sentences(3, true),
        ];
    }
}