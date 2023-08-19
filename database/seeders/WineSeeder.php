<?php

namespace Database\Seeders;

use App\Enums\Country;
use App\Enums\WineType;
use App\Models\User;
use App\Models\Wine;
use Illuminate\Database\Seeder;

class WineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()
            ->whereHas('wineries')
            ->first();

        $winery = $user->wineries()->first();

        Wine::query()
            ->create([
                'name' => 'Vintage Vines Reserve 1',
                'region' => 'Willowbrook Valley 1',
                'vintage' => 2020,
                'price' => 45.99,
                'wine_type' => WineType::RED,
                'country' => Country::USA,
                'description' => 'A harmonious blend of rich red fruits and velvety tannins...',
                'alcohol_content' => 14.5,
                'size_liters' => 0.75,
                'winery_id' => $winery->id,
                'image' => 'https://images.pexels.com/photos/2912108/pexels-photo-2912108.jpeg?cs=srgb&dl=pexels-kenneth-2912108.jpg&fm=jpg',
            ]);

        Wine::query()
            ->create([
                'name' => 'Vintage Vines Reserve 2',
                'region' => 'Willowbrook Valley 2',
                'vintage' => 2020,
                'price' => 45.99,
                'wine_type' => WineType::ROSE,
                'country' => Country::MKD,
                'description' => 'A harmonious blend of rich red fruits and velvety tannins...',
                'alcohol_content' => 14.5,
                'size_liters' => 0.75,
                'winery_id' => $winery->id,
                'image' => 'https://images.pexels.com/photos/2912108/pexels-photo-2912108.jpeg?cs=srgb&dl=pexels-kenneth-2912108.jpg&fm=jpg',
            ]);

        Wine::query()
            ->create([
                'name' => 'Vintage Vines Reserve 3',
                'region' => 'Willowbrook Valley 3',
                'vintage' => 2020,
                'price' => 45.99,
                'wine_type' => WineType::WHITE,
                'country' => Country::ABW,
                'description' => 'A harmonious blend of rich red fruits and velvety tannins...',
                'alcohol_content' => 14.5,
                'size_liters' => 0.75,
                'winery_id' => $winery->id,
                'image' => 'https://images.pexels.com/photos/2912108/pexels-photo-2912108.jpeg?cs=srgb&dl=pexels-kenneth-2912108.jpg&fm=jpg',
            ]);

        Wine::query()
            ->create([
                'name' => 'Vintage Vines Reserve 4',
                'region' => 'Willowbrook Valley 4',
                'vintage' => 2020,
                'price' => 45.99,
                'wine_type' => WineType::DESSERT,
                'country' => Country::HKG,
                'description' => 'A harmonious blend of rich red fruits and velvety tannins...',
                'alcohol_content' => 14.5,
                'size_liters' => 0.75,
                'winery_id' => $winery->id,
                'image' => 'https://images.pexels.com/photos/2912108/pexels-photo-2912108.jpeg?cs=srgb&dl=pexels-kenneth-2912108.jpg&fm=jpg',
            ]);
    }
}
