<?php

namespace Database\Seeders;

use App\Enums\Country;
use App\Enums\UserRole;
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
            ->firstWhere('role', UserRole::WINERY->value);

        Wine::query()
            ->create([
                'name' => 'Vintage Vines Reserve',
                'region' => 'Willowbrook Valley',
                'vintage' => 2020,
                'price' => 45.99,
                'wine_type' => WineType::RED,
                'country' => Country::USA,
                'description' => 'A harmonious blend of rich red fruits and velvety tannins...',
                'alcohol_content' => 14.5,
                'size_liters' => 0.75,
                'winery_id' => $user->winery->id,
                'image' => 'https://images.pexels.com/photos/2912108/pexels-photo-2912108.jpeg?cs=srgb&dl=pexels-kenneth-2912108.jpg&fm=jpg',
            ]);
    }
}
