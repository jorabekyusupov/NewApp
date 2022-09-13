<?php

namespace Database\Factories;

use App\Models\Brands;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandsFactory extends Factory
{
    protected $model = Brands::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}
