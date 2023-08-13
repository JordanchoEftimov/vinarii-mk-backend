<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()
            ->firstWhere('role', UserRole::WINERY->value);
        collect([
            [
                'name' => 'Jordancho',
                'surname' => 'Eftimov',
                'email' => 'jocka@gmail.com',
                'phone' => '077123123',
                'description' => 'This is the first contact message for the platform',
            ],
            [
                'name' => 'Kevin',
                'surname' => 'Simonov',
                'email' => 'kevin@gmail.com',
                'phone' => '077111222',
                'description' => 'This is the second contact message for the platform',
            ],
            [
                'name' => 'Martin',
                'surname' => 'Bojmaliev',
                'email' => 'martin@gmail.com',
                'phone' => '077111222',
                'description' => 'This is the second contact message for a winery',
                'user_id' => $user->id,
            ],
        ])->each(function ($contactMessage) {
            ContactMessage::query()
                ->create($contactMessage);
        });
    }
}
