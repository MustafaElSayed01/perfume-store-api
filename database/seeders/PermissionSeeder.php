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
            ['name' => 'view_products', 'label' => 'View Products'],
            ['name' => 'manage_products', 'label' => 'Manage Products'],
            ['name' => 'place_orders', 'label' => 'Place Orders'],
            ['name' => 'manage_orders', 'label' => 'Manage Orders'],
            ['name' => 'manage_users', 'label' => 'Manage Users'],
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm['name']], $perm);
        }
    }
}
