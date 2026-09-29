<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $email = config('elaeis.admin_email');
        $password = config('elaeis.admin_password');
        $generated = false;

        // Aucun mot de passe n'est écrit dans le code : il vient du .env,
        // ou il est généré aléatoirement s'il est absent.
        if (empty($password)) {
            $password = Str::random(14);
            $generated = true;
        }

        $admin = User::firstOrNew(['email' => $email]);
        $admin->forceFill([
            'name' => 'Administrateur Elaeis Prestige',
            'password' => $password,
            'role' => User::ROLE_ADMIN,
            'email_verified_at' => now(),
        ])->save();

        $this->command->info("Compte administrateur prêt : {$email}");

        if ($generated) {
            $this->command->warn("Mot de passe généré (notez-le maintenant) : {$password}");
        }
    }
}