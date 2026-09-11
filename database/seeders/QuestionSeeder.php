<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            [
                'question' => 'Les accès aux systèmes informatiques sont-ils correctement contrôlés ?',
                'categorie' => 'Contrôle des accès',
            ],
            [
                'question' => 'Les données sensibles sont-elles protégées contre les accès non autorisés ?',
                'categorie' => 'Protection des données',
            ],
            [
                'question' => 'Les données importantes sont-elles sauvegardées régulièrement ?',
                'categorie' => 'Sauvegarde',
            ],
            [
                'question' => 'Existe-t-il une procédure de gestion des incidents de sécurité ?',
                'categorie' => 'Gestion des incidents',
            ],
            [
                'question' => 'Les employés sont-ils régulièrement sensibilisés à la sécurité de l’information ?',
                'categorie' => 'Sensibilisation',
            ],
            [
                'question' => 'Les systèmes informatiques sont-ils régulièrement mis à jour ?',
                'categorie' => 'Sécurité des systèmes',
            ],
            [
                'question' => 'Les équipements informatiques sont-ils correctement inventoriés et protégés ?',
                'categorie' => 'Gestion des équipements',
            ],
            [
                'question' => 'Les fournisseurs ayant accès aux informations de l’organisation sont-ils évalués ?',
                'categorie' => 'Gestion des fournisseurs',
            ],
            [
                'question' => 'L’organisation dispose-t-elle d’un plan de continuité en cas d’incident majeur ?',
                'categorie' => 'Continuité d’activité',
            ],
            [
                'question' => 'Les risques liés à la sécurité de l’information sont-ils régulièrement identifiés et évalués ?',
                'categorie' => 'Gestion des risques',
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
