<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Categories::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}