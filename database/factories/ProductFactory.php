<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),  // Product name
            'description' => $this->faker->sentence, // Product description
            'price' => $this->faker->randomFloat(2, 10, 500), // Random price between 10 and 500
            'category' => $this->faker->word,        // Random category
            'quantity' => $this->faker->numberBetween(1, 100), // Random quantity between 1 and 100
            'tag' => $this->faker->word,             // Random tag
            'vendor' => $this->faker->company,       // Random vendor name
        ];
    }
}
