<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // Clients fictifs (« démo ») : ils ne peuvent pas se connecter (mot de passe aléatoire).
        $demo = [
            ['Koffi A. (démo)', 'client.demo1@elaeis-prestige.test', 5, "Commande simple et plants bien emballés. Je recommande pour démarrer une plantation."],
            ['Adjovi M. (démo)', 'client.demo2@elaeis-prestige.test', 4, "Équipe disponible et réactive. Mes questions sur la plantation ont toutes trouvé une réponse."],
            ['Fabrice H. (démo)', 'client.demo3@elaeis-prestige.test', 5, "Les prix et la disponibilité sont clairs avant de commander, c'est très pratique."],
        ];

        foreach ($demo as [$name, $email, $rating, $comment]) {
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'phone' => '00000000',
                    'password' => Str::random(32),
                    'role' => User::ROLE_CLIENT,
                ]
            );

            Review::firstOrCreate(
                ['user_id' => $user->id, 'comment' => $comment],
                ['product_id' => null, 'rating' => $rating, 'status' => Review::STATUS_APPROVED]
            );
        }
    }
}