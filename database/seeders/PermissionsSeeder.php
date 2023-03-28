<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Str;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Permissions

        Permission::create(['name' => 'view categorie']);
        Permission::create(['name' => 'create categorie']);
        Permission::create(['name' => 'edit categorie']);
        Permission::create(['name' => 'delete categorie']);

        Permission::create(['name' => 'view plant']);
        Permission::create(['name' => 'create plant']);
        Permission::create(['name' => 'edit plant']);
        Permission::create(['name' => 'delete plant']);

        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $vendeurRole = Role::create(['name' => 'vendeur']);
        $userRole = Role::create(['name' => 'user']);

        // Assign Permissions to Roles
        $adminRole->syncPermissions(Permission::all());
        $vendeurRole->syncPermissions([
            'view categorie', 'create categorie', 'edit categorie', 'delete categorie',
            'view plant', 'create plant', 'edit plant', 'delete plant',
        ]);
        $userRole->syncPermissions(['view categorie', 'view plant',]);
    }
}
