<?php

namespace Database\Seeders;

use App\Enums\Country;
use App\Enums\UserRole;
use App\Enums\WineType;
use App\Models\User;
use App\Models\Wine;
use App\Models\Winery;
use Illuminate\Database\Seeder;

class WineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wineries = Winery::all();

        foreach ($wineries as $winery) {
            for ($i = 1; $i <= 250; $i++) { // Create 250 wines for each winery
                Wine::query()
                    ->create([
                        'name' => 'Vintage Vines Reserve ' . $i,
                        'region' => 'Willowbrook Valley ' . $i,
                        'vintage' => rand(1980, 2022),
                        'price' => rand(10, 1000) / 10, // Random price between 1 and 100
                        'wine_type' => WineType::randomValue(), // Random wine type
                        'country' => Country::getRandomCountry(), // Random country
                        'description' => 'A harmonious blend of rich red fruits and velvety tannins...',
                        'alcohol_content' => rand(10, 16) / 10, // Random alcohol content between 1.0 and 1.6
                        'size_liters' => 0.75, // Standard wine bottle size
                        'winery_id' => $winery->id,
                        'image' => 'https://images.pexels.com/photos/2912108/pexels-photo-2912108.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                    ]);
            }
        }
    }
}
