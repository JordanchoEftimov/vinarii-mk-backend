<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Jordancho',
                'surname' => 'Eftimov',
                'email' => 'jocka@gmail.com',
                'phone' => '077123123',
                'description' => 'This is the first contact message',
            ],
            [
                'name' => 'Kevin',
                'surname' => 'Simonov',
                'email' => 'kevin@gmail.com',
                'phone' => '077111222',
                'description' => 'This is the second contact message',
            ],
        ])->each(function ($contactMessage) {
            ContactMessage::query()
                ->create($contactMessage);
        });
    }
}
