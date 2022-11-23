<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Service::class;
    public function definition()
    {
        $filePath = public_path('dashboard/services');
        return [

            'image' => 'services.jpg',
            'title_ar' => $this->faker->sentences(1, true),
            'title_en' => $this->faker->sentences(1, true),
            'url' => $this->faker->word(1, true),
            'description_ar' => $this->faker->sentences(10, true),
            'description_en' => $this->faker->sentences(10, true),
        ];
    }
}