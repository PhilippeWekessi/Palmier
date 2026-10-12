<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = 'Plant de palmier ' . fake()->randomElement(['Tenera', 'Dura']) . ' – ' . fake()->randomElement(['6 mois', '9 mois', '12 mois']);

        return [
            'category_id' => Category::factory(),
            'name' => $name,
            'slug' => Str::slug($name . '-' . fake()->unique()->numerify('###')),
            'reference' => 'PLANT-' . fake()->unique()->numerify('####'),
            'short_description' => fake()->sentence(10),
            'description' => fake()->paragraphs(3, true),
            'variety' => fake()->randomElement(['Tenera', 'Dura']),
            'age' => fake()->randomElement(['6 mois', '9 mois', '12 mois']),
            'price' => fake()->randomElement([1200, 1500, 1800, 2500, 3000]),
            'old_price' => null,
            'stock' => fake()->numberBetween(10, 500),
            'low_stock_threshold' => 10,
            'image' => 'images/images.jpg',
            'is_active' => true,
        ];
    }
}
