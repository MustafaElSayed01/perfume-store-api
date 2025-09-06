<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([

            'first_name' => 'Testing',
            'last_name' => 'User',
            'phone' => '0123456789',
            'date_of_birth' => '1990-01-01',
            'email' => 'testing@gmail.com',
            'password' => 'password',
            'is_active' => true,
        ]);

        User::factory()->count(100)->create();
    }
}
