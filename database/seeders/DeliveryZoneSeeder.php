<?php

namespace Database\Seeders;

use App\Models\DeliveryZone;
use Illuminate\Database\Seeder;

class DeliveryZoneSeeder extends Seeder
{
    public function run(): void
    {
        $zones = [
            ['name' => 'Cotonou', 'fee' => 3000, 'estimated_delay' => '24h à 48h', 'is_active' => true],
            ['name' => 'Abomey-Calavi', 'fee' => 3500, 'estimated_delay' => '24h à 48h', 'is_active' => true],
            ['name' => 'Porto-Novo', 'fee' => 4000, 'estimated_delay' => '48h', 'is_active' => true],
            ['name' => 'Ouidah', 'fee' => 5000, 'estimated_delay' => '48h à 72h', 'is_active' => true],
            ['name' => 'Allada', 'fee' => 6000, 'estimated_delay' => '3 à 4 jours', 'is_active' => true],
            ['name' => 'Bohicon', 'fee' => 8000, 'estimated_delay' => '3 à 4 jours', 'is_active' => true],
            ['name' => 'Abomey', 'fee' => 8500, 'estimated_delay' => '3 à 4 jours', 'is_active' => true],
            ['name' => 'Parakou', 'fee' => 15000, 'estimated_delay' => '4 à 5 jours', 'is_active' => true],
            ['name' => 'Autres communes (sur devis)', 'fee' => 0, 'estimated_delay' => 'Sur devis', 'is_active' => true],
        ];

        foreach ($zones as $zone) {
            DeliveryZone::updateOrCreate(
                ['name' => $zone['name']],
                $zone
            );
        }
    }
}
