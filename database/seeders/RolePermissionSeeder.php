<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::insert([
            ['name' => 'manage articles', 'guard_name' => 'web'],
            ['name' => 'manage events', 'guard_name' => 'web'],
            ['name' => 'manage gallery', 'guard_name' => 'web'],
            ['name' => 'manage members', 'guard_name' => 'web'],
            ['name' => 'manage settings', 'guard_name' => 'web'],
        ]);

        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $pengurus = Role::create(['name' => 'pengurus']);

        $admin->givePermissionTo(Permission::all());
        $editor->givePermissionTo(['manage articles', 'manage events']);
        $pengurus->givePermissionTo(['manage members']);
    }
}
