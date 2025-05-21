<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'provider']);
         // Crear permisos
        $permissions = [
            'create-providers',
            'view-provider', 
            'edit-provider',
            'delete-provider',
            'view-shipping',
            'edit-shipping',
            'view-customer',
            'edit-customer',
            'delete-customer',
            'view-quotes',
            'edit-quotes',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

            // Crear roles y asignar permisos
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $superAdmin->syncPermissions($permissions);

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions($permissions);

        $proveedor = Role::firstOrCreate(['name' => 'provider']);
        // Puede no tener permisos o tener específicos
        $proveedor->syncPermissions(['view-shipping', 'edit-shipping']);

            // Crear usuarios con esos roles
        User::factory()->superAdmin()->create([
            'email' => 'super@example.com'
        ]);
        
        User::factory()->admin()->create([
            'email' => 'admin@example.com'
        ]);
            User::factory()->provider()->create([
           'email' => 'provider@example.com'
        ]);

            User::factory()->count(5)->provider()->create();
    }
}
