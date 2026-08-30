<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'gerer_utilisateurs',
            'gerer_risques',
            'gerer_traitements',
            'voir_audit',
            'remplir_questionnaire',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        Role::findByName('Administrateur')->givePermissionTo($permissions);
        Role::findByName('Responsable sécurité')->givePermissionTo([
            'gerer_risques',
            'gerer_traitements',
        ]);
        Role::findByName('Auditeur')->givePermissionTo([
            'voir_audit',
        ]);
        Role::findByName('Utilisateur')->givePermissionTo([
            'remplir_questionnaire',
        ]);
    }
}
