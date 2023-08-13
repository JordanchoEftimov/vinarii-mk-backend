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
                'name' => 'Winery 1',
                'email' => 'winery1@gmail.com',
                'password' => 'winery123',
                'role' => UserRole::WINERY->value,
            ]);

        User::query()
            ->create([
                'name' => 'Winery 2',
                'email' => 'winery2@gmail.com',
                'password' => 'winery123',
                'role' => UserRole::WINERY->value,
            ]);

        User::query()
            ->create([
                'name' => 'Winery 3',
                'email' => 'winery3@gmail.com',
                'password' => 'winery123',
                'role' => UserRole::WINERY->value,
            ]);

        User::query()
            ->create([
                'name' => 'Winery 4',
                'email' => 'winery4@gmail.com',
                'password' => 'winery123',
                'role' => UserRole::WINERY->value,
            ]);

        User::query()
            ->create([
                'name' => 'Winery 5',
                'email' => 'winery5@gmail.com',
                'password' => 'winery123',
                'role' => UserRole::WINERY->value,
            ]);
    }
}
