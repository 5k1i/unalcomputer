<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createRoles();
        $this->createAdminUser();
        $this->createDealerUser();
    }

    /**
     * @return void
     */
    public function createRoles(): void
    {
        $adminRole = Role::create([
            'id' => RoleEnum::ADMIN,
            'name' => 'admin'
        ]);

        $dealerRole = Role::create([
            'id' => RoleEnum::DEALER,
            'name' => 'dealer'
        ]);
    }

    /**
     * @return void
     */
    public function createAdminUser(): void
    {
        $admin = new User([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $admin->save();

        $adminRole = Role::findById(RoleEnum::ADMIN);
        $admin->assignRole($adminRole);
    }

    /**
     * @return void
     */
    public function createDealerUser(): void
    {
        $dealerUser = new User([
            'name' => 'Dealer',
            'email' => 'dealer@admin.com',
            'password' => Hash::make('password'),
        ]);
        $dealerUser->save();

        $dealerUserRole = Role::findById(RoleEnum::DEALER);
        $dealerUser->assignRole($dealerUserRole);
    }
}
