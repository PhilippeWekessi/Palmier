<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $authorId = User::where('role', User::ROLE_ADMIN)->value('id');
        $note = "\n\nContenu de démonstration : à faire relire et adapter par votre équipe agricole avant publication.";

        $posts = [
            [
                'title' => 'Comment préparer une parcelle avant la plantation du palmier à huile',
                'days' => 12,
                'content' => "Une bonne plantation commence avant l'arrivée des plants. Choisissez une parcelle accessible, sans eau stagnante, et repérez ses limites avant de commencer les travaux.\n\n"
                    ."Débroussaillez et nettoyez le terrain, puis piquetez l'emplacement de chaque plant. Le palmier à huile est le plus souvent planté en triangle, avec environ 9 mètres entre les plants, soit autour de 143 plants par hectare.\n\n"
                    ."Préparez les trous à l'avance afin de planter dès l'arrivée des plants. Pour les dimensions exactes et le bon calendrier dans votre région, rapprochez-vous d'un technicien agricole local.".$note,
            ],
            [
                'title' => 'Comment choisir ses plants de palmier à huile',
                'days' => 8,
                'content' => "Vérifiez d'abord la variété proposée. La variété Tenera, issue du croisement Dura x Pisifera, est la plus répandue dans les plantations commerciales.\n\n"
                    ."Observez ensuite l'état des plants : feuilles vertes et saines, tige robuste, absence de taches ou de signes d'attaque d'insectes.\n\n"
                    ."Demandez toujours l'âge du plant et l'origine des semences, et préférez une pépinière qui répond clairement à vos questions.".$note,
            ],
            [
                'title' => 'Les premières étapes après la plantation',
                'days' => 5,
                'content' => "Après la mise en terre, les premières semaines sont décisives. Veillez à ce que les plants ne manquent pas d'eau en période sèche.\n\n"
                    ."Gardez le pied des plants propre en retirant les herbes qui leur font concurrence, et vérifiez régulièrement que chaque plant a bien repris.\n\n"
                    ."Les plants qui n'ont pas survécu doivent être remplacés rapidement pour garder une plantation homogène.".$note,
            ],
            [
                'title' => "Entretien d'une jeune plantation",
                'days' => 2,
                'content' => "Une jeune plantation demande un suivi régulier : désherbage autour des pieds, observation des feuilles et surveillance des parasites.\n\n"
                    ."La fertilisation dépend de votre sol et de votre région. Un technicien agricole peut vous indiquer les apports adaptés.\n\n"
                    ."Notez vos interventions au fil des mois : ce suivi vous aidera à repérer les problèmes tôt.".$note,
            ],
        ];

        foreach ($posts as $post) {
            Post::firstOrCreate(
                ['slug' => Str::slug($post['title'])],
                [
                    'user_id' => $authorId,
                    'title' => $post['title'],
                    'content' => $post['content'],
                    'status' => Post::STATUS_PUBLISHED,
                    'published_at' => now()->subDays($post['days']),
                ]
            );
        }
    }
}