<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Partner::class;
    public function definition()
    {
        $filePath = public_path('dashboard/partners');
        return [

            'image' => 'partners.jpg',
            'name_ar' => $this->faker->word(1, true),
            'name_en' => $this->faker->word(1, true),
        ];
    }
}