<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'all', 'description' => 'All Permissions'],
            ['name' => 'view_products', 'description' => 'View Products'],
            ['name' => 'manage_products', 'description' => 'Manage Products'],
            ['name' => 'place_orders', 'description' => 'Place Orders'],
            ['name' => 'manage_orders', 'description' => 'Manage Orders'],
            ['name' => 'manage_users', 'description' => 'Manage Users'],
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm['name']], $perm);
        }
    }
}
