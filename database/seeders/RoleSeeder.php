<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create permissions
        $permissions = [
            'manage seminars',
            'manage users',
            'view dashboard',
            'access_seminar',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $adminRole->givePermissionTo([
    'manage seminars',
    'manage users',
    'view dashboard',
]);

        
        // Assign user role to all existing users who don't have a role
        $users = User::all();
        foreach ($users as $user) {
            if (!$user->hasAnyRole(['admin', 'user'])) {
                $user->assignRole('user');
            }
        }

        // Assign admin role to the admin user
        $adminUser = User::where('email', 'admin@gmail.com')->first();
        if ($adminUser) {
            $adminUser->assignRole('admin');
        }
    }
}

