<?php

namespace Database\Seeders;

use App\Models\Permission;
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
        $this->call([
            UserTypeSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,

            UserSeeder::class,
            AddressSeeder::class,

            ProductTypeSeeder::class,
            ProductSeeder::class,

            CartSeeder::class,
            CartItemSeeder::class,

            OrderSeeder::class,
            OrderItemSeeder::class,
        ]);
    }
}