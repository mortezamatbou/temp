<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();

        // create article permissions
        Permission::create(['name' => 'list articles', 'guard_name' => 'web']);
        Permission::create(['name' => 'detail articles', 'guard_name' => 'web']);
        Permission::create(['name' => 'update articles', 'guard_name' => 'web']);
        Permission::create(['name' => 'create articles', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete articles', 'guard_name' => 'web']);

        // viewer
        $role_viewer = Role::create(['name' => 'viewer', 'guard_name' => 'web']);
        $role_viewer->givePermissionTo('list articles');
        $role_viewer->givePermissionTo('detail articles');

        // admin
        $role_admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $role_admin->givePermissionTo('list articles', 'detail articles', 'update articles', 'create articles');
        // super admin
        $role_super_admin = Role::create(['name' => 'super-admin', 'guard_name' => 'web']);

        // assign roles to users
        $user = User::where('email', 'mori@lobdown.com')->first();
        $user->assignRole($role_viewer);

        $user = User::where('email', 'ali@lobdown.com')->first();
        $user->assignRole($role_admin);

        $user = User::where('email', 'hossein@lobdown.com')->first();
        $user->assignRole($role_super_admin);


    }
}
