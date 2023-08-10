<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'email' => 'jocka@gmail.com',
            ],
            [
                'email' => 'kevin@gmail.com',
            ],
            [
                'email' => 'martin@gmail.com',
            ],
            [
                'email' => 'ace@gmail.com',
            ],
        ])->each(function ($subscription) {
            Subscription::query()
                ->create($subscription);
        });
    }
}
