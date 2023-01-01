<?php

namespace Database\Seeders\Shop;

use Illuminate\Support\Arr;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use App\Models\Shop\ShopCategory;
use App\Models\Shop\ShopProductFlat;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\Shop\ShopProductFactory;
use App\Actions\Shop\ShopProduct\CreateNewShopProduct;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard(false);

        /**
         * @var \Illuminate\Database\Eloquent\Collection
         */
        $organizations = Organization::query()
            ->inRandomOrder()
            ->take(5)
            ->get();

        /**
         * @var array
         */
        $categories = ShopCategory::query()
            ->inRandomOrder()
            ->pluck('id')
            ->toArray();

        ShopProductFlat::factory()->count(50)->make()->each(function ($product) use ($organizations, $categories) {
            $faker = \Illuminate\Container\Container::getInstance()->make(\Faker\Generator::class);
            CreateNewShopProduct::run([
                'organization' => $organizations->random(),
                'categories'   => Arr::random($categories, 10),
                'locale'       => 'ar',
                'images'       => [$faker->imageUrl()],
                'videos'       => [ShopProductFactory::$viedos[array_rand(ShopProductFactory::$viedos)]],
            ] + $product->toArray());
        });

        ShopProductFlat::factory()->count(50)->make()->each(function ($product) use ($organizations, $categories) {
            $faker = \Illuminate\Container\Container::getInstance()->make(\Faker\Generator::class);
            CreateNewShopProduct::run([
                'organization' => $organizations->random(),
                'categories'   => Arr::random($categories, 10),
                'locale'       => 'ar',
                'images'       => [$faker->imageUrl()],
                'videos'       => [ShopProductFactory::$viedos[array_rand(ShopProductFactory::$viedos)]],
            ] + Arr::only($product->toArray(), [
                'sku',
                'name',
                'status',
                'short_description',
                'description',
                'price',
                'weight',
            ]));
        });
    }
}
