<?php

namespace Database\Seeders;

use App\Enums\Country;
use App\Enums\WineType;
use App\Models\User;
use App\Models\Wine;
use App\Models\Winery;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class WineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $wineries = Winery::all();
        $imageLinks = [
            'https://w7.pngwing.com/pngs/573/483/png-transparent-red-wine-dessert-wine-liqueur-glass-bottle-wine-bottle-wine-glass-food-distilled-beverage.png',
            'https://images.pexels.com/photos/2912108/pexels-photo-2912108.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
            'https://www.hallwines.com/media/wysiwyg/HALL_KathrynHall_2020_Homepage_414x692.jpg',
            'https://s3.amazonaws.com/efcheckout/firstbottle/products/First-Bottle-Silver-Oak-Alexander-Valley-2016-(Magnum-1.5L)-product-image_alt-4661-large.jpg',
        ];
        foreach ($wineries as $winery) {
            for ($i = 1; $i <= 250; $i++) {
                $randomIndex = rand(0, 3);
                Wine::query()
                    ->create([
                        'name' => 'Vintage Vines Reserve ' . $i,
                        'region' => 'Willowbrook Valley ' . $i,
                        'vintage' => rand(1980, 2022),
                        'price' => rand(10, 1000) / 10, // Random price between 1 and 100
                        'wine_type' => WineType::randomValue(), // Random wine type
                        'country' => Country::getRandomCountry(), // Random country
                        'rating' => rand(10, 50) / 10.0,
                        'description' => 'A harmonious blend of rich red fruits and velvety tannins...',
                        'alcohol_content' => rand(10, 16) / 10, // Random alcohol content between 1.0 and 1.6
                        'size_liters' => 0.75, // Standard wine bottle size
                        'winery_id' => $winery->id,
                        'image' => $imageLinks[$randomIndex]
                    ]);
            }
        }
    }
}
