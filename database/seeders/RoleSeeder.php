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

        $permission_create_role = Permission::create(['name' => 'create roles']);
        $permission_read_role = Permission::create(['name' => 'read roles']);
        $permission_update_role = Permission::create(['name' => 'update roles']);
        $permission_delete_role = Permission::create(['name' => 'delete roles']);

        $permission_create_academic_area = Permission::create(['name' => 'create academic areas']);
        $permission_read_academic_area = Permission::create(['name' => 'read academic areas']);
        $permission_update_academic_area = Permission::create(['name' => 'update academic areas']);
        $permission_delete_academic_area = Permission::create(['name' => 'delete academic areas']);

        $permission_create_brand = Permission::create(['name' => 'create brands']);
        $permission_read_brand = Permission::create(['name' => 'read brands']);
        $permission_update_brand = Permission::create(['name' => 'update brands']);
        $permission_delete_brand = Permission::create(['name' => 'delete brands']);

        $permission_create_dependency = Permission::create(['name' => 'create dependencies']);
        $permission_read_dependency = Permission::create(['name' => 'read dependencies']);
        $permission_update_dependency = Permission::create(['name' => 'update dependencies']);
        $permission_delete_dependency = Permission::create(['name' => 'delete dependencies']);

        $permission_create_failure = Permission::create(['name' => 'create failures']);
        $permission_read_failure = Permission::create(['name' => 'read failures']);
        $permission_update_failure = Permission::create(['name' => 'update failures']);
        $permission_delete_failure = Permission::create(['name' => 'delete failures']);

        $permission_create_object = Permission::create(['name' => 'create objects']);
        $permission_read_object = Permission::create(['name' => 'read objects']);
        $permission_update_object = Permission::create(['name' => 'update objects']);
        $permission_delete_object = Permission::create(['name' => 'delete objects']);

        $permission_create_person = Permission::create(['name' => 'create persons']);
        $permission_read_person = Permission::create(['name' => 'read persons']);
        $permission_update_person = Permission::create(['name' => 'update persons']);
        $permission_delete_person = Permission::create(['name' => 'delete persons']);

        $permission_create_user = Permission::create(['name' => 'create users']);
        $permission_read_user = Permission::create(['name' => 'read users']);
        $permission_update_user = Permission::create(['name' => 'update users']);
        $permission_delete_user = Permission::create(['name' => 'delete users']);

        $permission_create_order_device = Permission::create(['name' => 'create order devices']);
        $permission_read_order_device = Permission::create(['name' => 'read order devices']);
        $permission_update_order_device = Permission::create(['name' => 'update order devices']);
        $permission_delete_order_device = Permission::create(['name' => 'delete order devices']);

        $permission_create_order = Permission::create(['name' => 'create orders']);
        $permission_read_order = Permission::create(['name' => 'read orders']);
        $permission_update_order = Permission::create(['name' => 'update orders']);
        $permission_delete_order = Permission::create(['name' => 'delete orders']);

        $permission_create_computer = Permission::create(['name' => 'create computers']);
        $permission_read_computer = Permission::create(['name' => 'read computers']);
        $permission_update_computer = Permission::create(['name' => 'update computers']);
        $permission_delete_computer = Permission::create(['name' => 'delete computers']);

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
