<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionsSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = ['shippings', 'quotes', 'status', 'users'];

        foreach ($modules as $mod) {
            $module = Module::create(['name' => $mod]);

            foreach (['create', 'read', 'update', 'delete'] as $act) {
                // $perm = Permission::create(['name' => "$act $mod"]);
                // $module->permissions()->attach($perm);
                $module->permissions()->create([
                    'name' => "$act $mod"
                ]);
            }
        }

        // Roles
        $super = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $prov = Role::create(['name' => 'provider']);

        // Permisos
        $super->givePermissionTo(Permission::all());

        $admin->givePermissionTo(Permission::whereIn('name', function ($query) {
            $query->select('name')->from('permissions')
                ->where('name', 'like', 'create%')
                ->orWhere('name', 'like', 'update%');
        })->get());

        $prov->givePermissionTo([
            'read shippings', 'update shippings',
            'read status', 'update status'
        ]);

        User::factory()->superAdmin()->create([
            'user_name' => 'superAdmin',
            'email' => 'super@example.com',
            'first_name' => 'Super Admin',
            'last_name' => 'Administrador'
        ]);

        User::factory()->admin()->create([
            'user_name' => 'sa',
            'email' => 'admin@example.com',
            'first_name' => 'Admin',
            'last_name' => 'admin'
        ]);

        User::factory()->provider()->create([
            'user_name' => 'proveedor',
            'email' => 'provider@example.com'
        ]);

        User::factory()->count(5)->provider()->create();
    }
}
