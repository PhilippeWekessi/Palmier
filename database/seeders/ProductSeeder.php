<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id', 'name');

        $products = [
            ['DEMO-001', 'Plant de palmier Tenera – 6 mois', 'Plants en pépinière', 'Tenera', '6 mois', 1200, null, 800, 50, 'images/images.jpg', ['images/images (1).jpg', 'images/images (2).jpg']],
            ['DEMO-002', 'Plant de palmier Tenera – 9 mois', 'Plants en pépinière', 'Tenera', '9 mois', 1800, null, 600, 50, 'images/images (1).jpg', ['images/images (2).jpg', 'images/images (3).jpg']],
            ['DEMO-003', 'Plant de palmier Tenera – 12 mois', 'Plants prêts à planter', 'Tenera', '12 mois', 2500, 2800, 450, 30, 'images/images (2).jpg', ['images/images (4).jpg', 'images/images (5).jpg']],
            ['DEMO-004', 'Plant de palmier Dura – 6 mois', 'Plants en pépinière', 'Dura', '6 mois', 1000, null, 300, 30, 'images/images (3).jpg', ['images/images (1).jpg', 'images/images (6).jpg']],
            ['DEMO-005', 'Plant de palmier Dura – 12 mois', 'Plants prêts à planter', 'Dura', '12 mois', 2000, null, 200, 20, 'images/images (4).jpg', ['images/images (7).jpg', 'images/images (8).jpg']],
            ['DEMO-006', 'Plant de palmier Tenera – 14 mois', 'Plants prêts à planter', 'Tenera', '14 mois', 3000, null, 150, 20, 'images/images (5).jpg', ['images/images (8).jpg', 'images/images (9).jpg']],
            ['DEMO-007', 'Lot de 50 plants Tenera – 9 mois', 'Lots professionnels', 'Tenera', '9 mois', 80000, 90000, 40, 5, 'images/images (6).jpg', ['images/images (1).jpg', 'images/images (3).jpg']],
            ['DEMO-008', 'Lot de 100 plants Tenera – 12 mois', 'Lots professionnels', 'Tenera', '12 mois', 220000, 240000, 25, 5, 'images/images (7).jpg', ['images/images (2).jpg', 'images/images (5).jpg']],
            ['DEMO-009', 'Lot de 500 plants Tenera – 12 mois', 'Lots professionnels', 'Tenera', '12 mois', 1000000, null, 4, 5, 'images/images (8).jpg', ['images/images (4).jpg', 'images/images (6).jpg']],
            ['DEMO-010', 'Plant de palmier Tenera – 3 mois', 'Plants en pépinière', 'Tenera', '3 mois', 800, null, 0, 50, 'images/images (9).jpg', ['images/images.jpg', 'images/images (7).jpg']],
        ];

        foreach ($products as [$reference, $name, $category, $variety, $age, $price, $oldPrice, $stock, $threshold, $image, $gallery]) {
            $product = Product::updateOrCreate(
                ['reference' => $reference],
                [
                    'category_id' => $categories[$category] ?? null,
                    'name' => $name,
                    'short_description' => "Palmier à huile sélectionné {$variety}, {$age}. Plants robustes et vigoureux.",
                    'description' => "Plant de palmier à huile de variété {$variety}, âgé de {$age}, issu d'une sélection rigoureuse et élevé en pépinière dans des conditions optimales au Bénin. Idéal pour garantir une bonne reprise en terre et un haut rendement d'huile.",
                    'variety' => $variety,
                    'age' => $age,
                    'price' => $price,
                    'old_price' => $oldPrice,
                    'stock' => $stock,
                    'low_stock_threshold' => $threshold,
                    'image' => $image,
                    'is_active' => true,
                ]
            );

            // Galerie d'images
            $product->images()->delete();
            foreach ($gallery as $position => $galleryPath) {
                $product->images()->create([
                    'path' => $galleryPath,
                    'position' => $position + 1,
                ]);
            }
        }
    }
}