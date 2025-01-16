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

        $permission_create_person = Permission::ceate(['name' => 'create persons']);
        $permission_read_person = Permission::ceate(['name' => 'read persons']);
        $permission_update_person = Permission::ceate(['name' => 'update persons']);
        $permission_delete_person = Permission::ceate(['name' => 'delete persons']);

        $permission_create_user = Permission::ceate(['name' => 'create users']);
        $permission_read_user = Permission::ceate(['name' => 'read users']);
        $permission_update_user = Permission::ceate(['name' => 'update users']);
        $permission_delete_user = Permission::ceate(['name' => 'delete users']);

        $permission_create_order_device = Permission::ceate(['name' => 'create order devices']);
        $permission_read_order_device = Permission::ceate(['name' => 'read order devices']);
        $permission_update_order_device = Permission::ceate(['name' => 'update order devices']);
        $permission_delete_order_device = Permission::ceate(['name' => 'delete order devices']);

        $permission_create_order = Permission::ceate(['name' => 'create orders']);
        $permission_read_order = Permission::ceate(['name' => 'read orders']);
        $permission_update_order = Permission::ceate(['name' => 'update orders']);
        $permission_delete_order = Permission::ceate(['name' => 'delete orders']);

        $permission_create_computer = Permission::ceate(['name' => 'create computers']);
        $permission_read_computer = Permission::ceate(['name' => 'read computers']);
        $permission_update_computer = Permission::ceate(['name' => 'update computers']);
        $permission_delete_computer = Permission::ceate(['name' => 'delete computers']);

        $permissions_admin = [
            $permission_create_role,
            $permission_read_role,
            $permission_update_role,
            $permission_delete_role,
            $permission_create_academic_area,
            $permission_read_academic_area,
            $permission_update_academic_area,
            $permission_delete_academic_area,
            $permission_create_brand,
            $permission_read_brand,
            $permission_update_brand,
            $permission_delete_brand,
            $permission_create_dependency,
            $permission_read_dependency,
            $permission_update_dependency,
            $permission_delete_dependency,
            $permission_create_failure,
            $permission_read_failure,
            $permission_update_failure,
            $permission_delete_failure,
            $permission_create_object,
            $permission_read_object,
            $permission_update_object,
            $permission_delete_object,
            $permission_create_person,
            $permission_read_person,
            $permission_update_person,
            $permission_delete_person,
            $permission_create_user,
            $permission_read_user,
            $permission_update_user,
            $permission_delete_user,
            $permission_create_order_device,
            $permission_read_order_device,
            $permission_update_order_device,
            $permission_delete_order_device,
            $permission_create_order,
            $permission_read_order,
            $permission_update_order,
            $permission_delete_order,
            $permission_create_computer,
            $permission_read_computer,
            $permission_update_computer,
            $permission_delete_computer
        ];

        $permissions_editor = [
            $permission_create_academic_area,
            $permission_read_academic_area,
            $permission_update_academic_area,
            $permission_delete_academic_area,
            $permission_create_brand,
            $permission_read_brand,
            $permission_update_brand,
            $permission_delete_brand,
            $permission_create_dependency,
            $permission_read_dependency,
            $permission_update_dependency,
            $permission_delete_dependency,
            $permission_create_failure,
            $permission_read_failure,
            $permission_update_failure,
            $permission_delete_failure,
            $permission_create_object,
            $permission_read_object,
            $permission_update_object,
            $permission_delete_object,
            $permission_create_person,
            $permission_read_person,
            $permission_update_person,
            $permission_delete_person,
            $permission_create_order_device,
            $permission_read_order_device,
            $permission_update_order_device,
            $permission_delete_order_device,
            $permission_create_order,
            $permission_read_order,
            $permission_update_order,
            $permission_delete_order,
            $permission_create_computer,
            $permission_read_computer,
            $permission_update_computer,
            $permission_delete_computer
        ];

        $role_admin->syncPermissions($permissions_admin);
        $role_editor->syncPermissions($permissions_editor);

        /*A continuación un ejemplo para permisos individuales*/
        /*$roleTecnico->givePermissionTo($permission_read_brand)*/

    }
}
