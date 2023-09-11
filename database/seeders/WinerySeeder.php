<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Wine;
use App\Models\Winery;
use http\Client\Curl\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WinerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wineries = Winery::query()->get();

        foreach ($wineries as $i => $winery) {
            $winery->legal_name = 'Winery ' . ($i + 1);
            $winery->logo_image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQz_Y_xijF5v_1ZkbGhWSasHiHwMdgX6nOCVXUQU0XoxVauzu0jdBKkhNQA2sAT_9QI8V4&usqp=CAU';
            $winery->cover_image = 'https://www.thetopvillas.com/blog/wp-content/uploads/2018/07/wine-featured.jpg';
            $winery->address = 'Address ' . ($i + 1);
            $winery->email = 'winery' . ($i + 1) . '@example.com';
            $winery->phone = '123-456-789' . $i;
            $winery->description = 'Description for Winery ' . ($i + 1);
            $winery->working_hours = 'Working Hours ' . ($i + 1);

            $winery->save();
        }
    }
}
