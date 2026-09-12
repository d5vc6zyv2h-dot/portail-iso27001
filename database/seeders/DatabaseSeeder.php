<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        $admin = User::firstOrCreate(
    ['email' => 'admin@exemple.com'],
    [
        'name' => 'Administrateur',
        'password' => bcrypt('ChangeMoi123!'),
        'email_verified_at' => now(),
    ]
);

        $admin->assignRole('Administrateur');

        $this->call(QuestionSeeder::class);
    }
}
