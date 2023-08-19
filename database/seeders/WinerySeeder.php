<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use App\Models\Winery;
use Illuminate\Database\Seeder;

class WinerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()
            ->firstWhere('role', UserRole::WINERY->value);

        Winery::query()
            ->create([
                'legal_name' => $user->name,
                'user_id' => $user->id,
            ]);
    }
}
