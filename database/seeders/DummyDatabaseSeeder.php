<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Shop\ProductsSeeder;
use Database\Seeders\Shop\AttributesSeeder;
use Database\Seeders\Shop\AdvertisementsSeeder;
use Database\Seeders\Shop\ShopCategoriesSeeder;
use Database\Seeders\Shop\AttributeOptionsSeeder;
use Database\Seeders\Shop\CategoryFilterableAttributesSeeder;

class DummyDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AttributesSeeder::class);
        $this->call(AttributeOptionsSeeder::class);
        $this->call(ShopCategoriesSeeder::class);
        $this->call(CategoryFilterableAttributesSeeder::class);
        $this->call(AdvertisementsSeeder::class);
        $this->call(ProductsSeeder::class);
    }
}
