<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'show orders']);
        Permission::create(['name' => 'manage custumers']);
        Permission::create(['name' => 'manage clients']);
        Permission::create(['name' => 'manage orders']);
        Permission::create(['name' => 'manage drivers']);
        Permission::create(['name' => 'manage employee']);
        Permission::create(['name' => 'manage configs']);
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'manage categories']);


        Role::create(['name' => 'client'])
            ->givePermissionTo(['show orders']);

        Role::create(['name' => 'super_admin'])
            ->givePermissionTo(
                ['show orders'],
                ['manage custumers'],
                ['manage clients'],
                ['manage orders'],
                ['manage drivers'],
                ['manage employee'],
                ['manage configs'],
                ['manage products'],
                ['manage categories']
            );

        Role::create(['name' => 'employee'])
            ->givePermissionTo(
                ['show orders'],
                ['manage custumers'],
                ['manage clients'],
                ['manage orders'],
                ['manage drivers'],
                ['manage products'],
                ['manage categories']
            );
    }
}
