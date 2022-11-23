<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = News::class;
    public function definition()
    {
        $filePath = public_path('dashboard/news');
        return [

            'image' => 'news.jpg',
            'title_ar' => $this->faker->sentences(1, true),
            'title_en' => $this->faker->sentences(1, true),
            'url' => $this->faker->word(1, true),
            'description_ar' => $this->faker->sentences(10, true),
            'description_en' => $this->faker->sentences(10, true),
        ];
    }
}