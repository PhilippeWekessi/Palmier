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
            ['DEMO-001', 'Plant de palmier Tenera – 6 mois', 'Plants en pépinière', 'Tenera', '6 mois', 1200, null, 800, 50],
            ['DEMO-002', 'Plant de palmier Tenera – 9 mois', 'Plants en pépinière', 'Tenera', '9 mois', 1800, null, 600, 50],
            ['DEMO-003', 'Plant de palmier Tenera – 12 mois', 'Plants prêts à planter', 'Tenera', '12 mois', 2500, 2800, 450, 30],
            ['DEMO-004', 'Plant de palmier Dura – 6 mois', 'Plants en pépinière', 'Dura', '6 mois', 1000, null, 300, 30],
            ['DEMO-005', 'Plant de palmier Dura – 12 mois', 'Plants prêts à planter', 'Dura', '12 mois', 2000, null, 200, 20],
            ['DEMO-006', 'Plant de palmier Tenera – 14 mois', 'Plants prêts à planter', 'Tenera', '14 mois', 3000, null, 150, 20],
            ['DEMO-007', 'Lot de 50 plants Tenera – 9 mois', 'Lots professionnels', 'Tenera', '9 mois', 80000, 90000, 40, 5],
            ['DEMO-008', 'Lot de 100 plants Tenera – 12 mois', 'Lots professionnels', 'Tenera', '12 mois', 220000, 240000, 25, 5],
            ['DEMO-009', 'Lot de 500 plants Tenera – 12 mois', 'Lots professionnels', 'Tenera', '12 mois', 1000000, null, 4, 5],
            ['DEMO-010', 'Plant de palmier Tenera – 3 mois', 'Plants en pépinière', 'Tenera', '3 mois', 800, null, 0, 50],
        ];

        foreach ($products as [$reference, $name, $category, $variety, $age, $price, $oldPrice, $stock, $threshold]) {
            Product::updateOrCreate(
                ['reference' => $reference],
                [
                    'category_id' => $categories[$category] ?? null,
                    'name' => $name,
                    'short_description' => "Palmier à huile {$variety}, {$age}. Donnée de démonstration.",
                    'description' => "DONNÉE DE DÉMONSTRATION. Plant de palmier à huile de variété {$variety}, âgé de {$age}, élevé en pépinière. "
                        ."Cette fiche est un exemple : remplacez-la par les caractéristiques réelles de vos plants.",
                    'variety' => $variety,
                    'age' => $age,
                    'price' => $price,
                    'old_price' => $oldPrice,
                    'stock' => $stock,
                    'low_stock_threshold' => $threshold,
                    'is_active' => true,
                ]
            );
        }
    }
}