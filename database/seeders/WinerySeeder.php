<?php

namespace Database\Seeders;

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
        $winery = Winery::query()->find(1);
        if ($winery) {
            $winery->logo_image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQz_Y_xijF5v_1ZkbGhWSasHiHwMdgX6nOCVXUQU0XoxVauzu0jdBKkhNQA2sAT_9QI8V4&usqp=CAU';
            $winery->cover_image = 'https://www.thetopvillas.com/blog/wp-content/uploads/2018/07/wine-featured.jpg';
            $winery->address = 'Винарска визба Попова Кула АД Демир Капија';
            $winery->email = 'contact@popovskakula.com.mk';
            $winery->phone = '+389 76 432 630';
            $winery->description = 'Винарска Визба Попова Кула има уникатна палета од фини вина од меѓународни но и од локални и регионални сорти на грозје меѓу кои и од Станушина. ';
            $winery->working_hours = 'Mon-Fri: 08:00-16:00';
        }
        $winery->save();

    }
}
