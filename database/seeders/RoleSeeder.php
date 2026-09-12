<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
	Role::firstOrCreate(['name' => 'Administrateur']);
	Role::firstOrCreate(['name' => 'Responsable sécurité']);
	Role::firstOrCreate(['name' => 'Auditeur']);
	Role::firstOrCreate(['name' => 'Utilisateur']);
    }
}
