<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $admin = User::factory()->create([
        'name' => 'Administrateur',
        'email' => 'admin@exemple.com',
        'password' => bcrypt('ChangeMoi123!'),
    ]);

    $admin->assignRole('Administrateur');

    $this->call(QuestionSeeder::class);
}
