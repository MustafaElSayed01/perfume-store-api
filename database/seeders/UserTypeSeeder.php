<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin', 'description' => 'System Administrator'],
            ['name' => 'customer', 'description' => 'Regular customer'],
            ['name' => 'seller', 'description' => 'Store seller/author'],
        ];

        foreach ($roles as $role) {
            UserType::firstOrCreate(['name' => $role['name']], $role);
        }
    }
}
