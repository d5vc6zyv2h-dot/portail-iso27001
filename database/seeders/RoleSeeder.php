<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'Administrateur']);
        Role::create(['name' => 'Responsable sécurité']);
        Role::create(['name' => 'Auditeur']);
        Role::create(['name' => 'Utilisateur']);
    }
}
