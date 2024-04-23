<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->createRoles();

        User::factory()->create([
            'name' => 'Test User',
            'password' => bcrypt('password'),
            'email' => 'test@example.com',
        ])->assignRole(RoleEnum::ADMIN);
    }

    /**
     * @return void
     */
    public function createRoles(): void
    {
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->logicalId = RoleEnum::ADMIN;
        $adminRole->save();

        $adminRole = new Role();
        $adminRole->name = "user";
        $adminRole->logicalId = RoleEnum::USER;
        $adminRole->save();
    }
}
