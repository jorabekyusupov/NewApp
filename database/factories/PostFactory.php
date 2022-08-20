<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'title_uz' => $this->faker->title,
            'title_en' => $this->faker->title,
            'title_ru' => $this->faker->title,
            'sub_title_uz' => $this->faker->sentence,
            'sub_title_ru' => $this->faker->sentence,
            'sub_title_en' => $this->faker->sentence,
            'sub_title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'category_id' => Category::query()->inRandomOrder()->first()->id,
            'user_id' => 1
        ];
    }
}
