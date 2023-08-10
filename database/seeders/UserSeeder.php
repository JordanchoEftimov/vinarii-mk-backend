<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()
            ->create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin123',
                'role' => UserRole::ADMIN->value,
            ]);

        User::query()
            ->create([
                'name' => 'Winery',
                'email' => 'winery@gmail.com',
                'password' => 'winery123',
                'role' => UserRole::WINERY->value,
            ]);
    }
}
