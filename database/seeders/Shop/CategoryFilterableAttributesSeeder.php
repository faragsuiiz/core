<?php

namespace Database\Seeders\Shop;

use Illuminate\Support\Arr;
use App\Models\Shop\Attribute;
use App\Models\Shop\ShopCategory;
use Illuminate\Database\Seeder;

class CategoryFilterableAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ShopCategory::get();
        $attributes = Attribute::filterable()->get(['id'])->pluck('id')->toArray();

        foreach ($categories as $category) {
            $category->filters()->sync(Arr::random($attributes, 2));
        }
    }
}
