<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = UserType::where('name', 'admin')->first();
        $customer = UserType::where('name', 'customer')->first();
        $seller = UserType::where('name', 'seller')->first();

        $allPermissions = Permission::pluck('id', 'name');
        if ($admin) {
            $admin->permissions()->sync($allPermissions->values()->all());
        }

        if ($customer) {
            $customer->permissions()->sync([
                $allPermissions['view_products'],
                $allPermissions['place_orders'],
            ]);
        }

        if ($seller) {
            $seller->permissions()->sync([
                $allPermissions['view_products'],
                $allPermissions['manage_products'],
                $allPermissions['manage_orders'],
            ]);
        }
    }
}
