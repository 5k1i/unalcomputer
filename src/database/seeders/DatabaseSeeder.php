<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $admin = User::factory()->create([
            'name' => 'Test Admin',
            'password' => bcrypt('password'),
            'email' => 'test@example.com',
        ]);

        $user = User::factory()->create([
            'name' => 'Test User',
            'password' => bcrypt('password'),
            'email' => 'user@example.com',
        ]);

        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);

        $admin->assignRole($adminRole);
        $user->assignRole($userRole);
    }
}
