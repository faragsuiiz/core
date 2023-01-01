<?php

namespace Database\Seeders\Shop;

use App\Enums\ShopAdvertisementType;
use Illuminate\Database\Seeder;
use App\Models\Shop\Advertisement;

class AdvertisementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advertisement::factory()->count(10)->create(['type' => ShopAdvertisementType::EXTERNAL_LINK]);
        Advertisement::factory()->count(5)->create(['type' => ShopAdvertisementType::SHOP_CATEGORIES]);
    }
}
