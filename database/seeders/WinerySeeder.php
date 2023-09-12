<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use App\Models\Wine;
use App\Models\Winery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WinerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $wineryUsers = User::where('role', UserRole::WINERY->value)->get();
        $imageLinks = [
            'https://www.thetopvillas.com/blog/wp-content/uploads/2018/07/wine-featured.jpg',
            'https://www.lux-review.com/wp-content/uploads/2019/09/vineyard.jpg',
            'https://assets-global.website-files.com/5ddea854c6438680c98a678d/6261865ff84bf299c86cfe10_ba74821b-551e-57bd-a0c6-d69f475beaef.jpg'
        ];
        for ($i = 0; $i < 10; $i++) {
            $randomIndex = rand(0, 2);
            $user = $wineryUsers->random();

            $wineryData = [
                'legal_name' => 'Winery ' . ($i + 1),
                'user_id' => $user->id,
                'logo_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQz_Y_xijF5v_1ZkbGhWSasHiHwMdgX6nOCVXUQU0XoxVauzu0jdBKkhNQA2sAT_9QI8V4&usqp=CAU',
                'cover_image' => $imageLinks[$randomIndex],
                'address' => 'Address ' . ($i + 1),
                'email' => 'winery' . ($i + 1) . '@example.com',
                'phone' => '123-456-789' . $i,
                'description' => 'Description for Winery ' . ($i + 1),
                'working_hours' => 'Working Hours ' . ($i + 1),
            ];

            // Create the winery
            Winery::create($wineryData);
        }
    }
}
