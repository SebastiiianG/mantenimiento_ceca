<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_editor = Role::create(['name' => 'editor']);

        $permission_create_role = Permission::ceate(['name' => 'create roles']);
        $permission_read_role = Permission::ceate(['name' => 'read roles']);
        $permission_update_role = Permission::ceate(['name' => 'update roles']);
        $permission_delete_role = Permission::ceate(['name' => 'delete roles']);

        $permission_create_academic_area = Permission::ceate(['name' => 'create academic areas']);
        $permission_read_academic_area = Permission::ceate(['name' => 'read academic areas']);
        $permission_update_academic_area = Permission::ceate(['name' => 'update academic areas']);
        $permission_delete_academic_area = Permission::ceate(['name' => 'delete academic areas']);

        $permission_create_brand = Permission::ceate(['name' => 'create brands']);
        $permission_read_brand = Permission::ceate(['name' => 'read brands']);
        $permission_update_brand = Permission::ceate(['name' => 'update brands']);
        $permission_delete_brand = Permission::ceate(['name' => 'delete brands']);

        $permission_create_dependency = Permission::ceate(['name' => 'create dependencies']);
        $permission_read_dependency = Permission::ceate(['name' => 'read dependencies']);
        $permission_update_dependency = Permission::ceate(['name' => 'update dependencies']);
        $permission_delete_dependency = Permission::ceate(['name' => 'delete dependencies']);

        $permission_create_failure = Permission::ceate(['name' => 'create failures']);
        $permission_read_failure = Permission::ceate(['name' => 'read failures']);
        $permission_update_failure = Permission::ceate(['name' => 'update failures']);
        $permission_delete_failure = Permission::ceate(['name' => 'delete failures']);

        $permission_create_object = Permission::ceate(['name' => 'create objects']);
        $permission_read_object = Permission::ceate(['name' => 'read objects']);
        $permission_update_object = Permission::ceate(['name' => 'update objects']);
        $permission_delete_object = Permission::ceate(['name' => 'delete objects']);





    }
}
