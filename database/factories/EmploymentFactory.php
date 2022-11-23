<?php

namespace Database\Factories;

use App\Models\Employment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employment>
 */
class EmploymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Employment::class;
    public function definition()
    {
        $filePath = public_path('dashboard/employments');
        return [

            'image' => 'employments.jpg',
            'title_ar' => $this->faker->sentences(1, true),
            'title_en' => $this->faker->sentences(1, true),
            'url' => $this->faker->word(1, true),
            'description_ar' => $this->faker->sentences(10, true),
            'description_en' => $this->faker->sentences(10, true),
        ];
    }
}