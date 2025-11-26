<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // 1. Buat atau ambil role admin
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin', 'guard_name' => 'web']
        );

        // 2. Permissions CMS
        $permissions = [
            'manage articles',
            'manage events',
            'manage gallery',
            'manage members',
            'manage settings',
            'access dashboard'
        ];

        // 3. Insert permission jika belum ada
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(
                ['name' => $perm, 'guard_name' => 'web']
            );
        }

        // 4. Berikan semua permission ke role admin
        $adminRole->syncPermissions(Permission::all());

        // 5. Buat user admin default
        $admin = User::firstOrCreate(
            ['email' => 'admin@komunitasmotor.test'], // Email bebas
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123'), // Ganti sesuai keinginan
            ]
        );

        // 6. Assign role admin ke user admin
        $admin->assignRole('admin');
    }
}
