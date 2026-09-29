<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Plants prêts à planter', 'description' => 'Plants suffisamment développés pour être mis en terre.'],
            ['name' => 'Plants en pépinière', 'description' => 'Jeunes plants à élever avant la plantation définitive.'],
            ['name' => 'Lots professionnels', 'description' => 'Quantités adaptées aux exploitations et aux grands projets.'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description'], 'is_active' => true]
            );
        }
    }
}