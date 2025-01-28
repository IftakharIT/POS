<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Categories;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = Categories::all()->pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            // Fetch a random image from Lorem Picsum
            $imageUrl = 'https://picsum.photos/200/300';
            $imageContents = file_get_contents($imageUrl);
            $imageName = 'adminpannel/dist/img/' . $faker->uuid . '.jpg';
            Storage::disk('public')->put($imageName, $imageContents);

            Product::create([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 1, 100),
                'category_id' => $faker->randomElement($categories),
                'quantity' => $faker->numberBetween(1, 100),
                'tag' => $faker->word,
                'vendor' => $faker->company,
                'image' => $imageName,
            ]);
        }
    }
}
