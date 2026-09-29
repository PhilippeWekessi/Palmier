<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Services\SettingsService;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        // firstOrCreate : ne jamais écraser un réglage modifié ensuite par l'administrateur.
        foreach (SettingsService::defaults() as $key => $value) {
            if ($value !== null && $value !== '') {
                Setting::firstOrCreate(['key' => $key], ['value' => $value]);
            }
        }
    }
}