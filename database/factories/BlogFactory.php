<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Blog::class;
    public function definition()
    {
        $filePath = public_path('dashboard/blogs');
        return [
            // 'image' => $this->faker->imageUrl($filePath,550,340),
            'image' => '20221026063620.LwL6QMNyMbrExSc5h25Oc9fAstPjwWFyrLhv2Lp9.jpg',
            'title_ar' => $this->faker->sentences(1, true),
            'title_en' => $this->faker->sentences(1, true),
            'url' => $this->faker->word(1, true),
            'description_ar' => $this->faker->sentences(10, true),
            'description_en' => $this->faker->sentences(10, true),
        ];
    }
}