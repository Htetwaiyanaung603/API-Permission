<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Role_PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create article',
            'edit article',
        ];

        foreach ($permissions as $permission) {

            Permission::create(['guard_name' => 'web', 'name' => $permission]);
        }

        $createdRole = Role::create(['name' => 'Tester', 'guard_name' => 'web']);

        $createdRole->syncPermissions($permissions);
                   
    }
}
