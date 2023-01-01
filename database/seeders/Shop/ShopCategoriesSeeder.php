<?php

namespace Database\Seeders\Shop;

use App\Models\Category;
use App\Models\Shop\ShopCategory;
use Illuminate\Database\Seeder;

class ShopCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::where('parent_id', 0)->get()->each(function ($category) {
            $parent = ShopCategory::create([
                // 'image'    => $category->icon,
                'position' => 0,
                'status'   => true,
                'ar'       => [
                    'name'             => $category->translate('name', 'ar'),
                    'description'      => $category->translate('description', 'ar'),
                    'meta_title'       => $category->translate('name', 'ar'),
                    'meta_description' => $category->translate('description', 'ar'),
                    'meta_keywords'    => $category->translate('name', 'ar') . ' ' . $category->translate('description', 'ar'),
                ],
                'en'       => [
                    'name'             => $category->translate('name', 'en'),
                    'description'      => $category->translate('description', 'en'),
                    'meta_title'       => $category->translate('name', 'en'),
                    'meta_description' => $category->translate('description', 'en'),
                    'meta_keywords'    => $category->translate('name', 'en') . ' ' . $category->translate('description', 'ar'),
                ],
            ]);

            $category->nestedChildren->each(function ($child) use ($parent) {
                $parent->children()->create([
                    // 'image'    => $child->icon,
                    'position' => 0,
                    'status'   => true,
                    'ar'       => [
                        'name'             => $child->translate('name', 'ar'),
                        'description'      => $child->translate('description', 'ar'),
                        'meta_title'       => $child->translate('name', 'ar'),
                        'meta_description' => $child->translate('description', 'ar'),
                        'meta_keywords'    => $child->translate('name', 'ar') . ' ' . $child->translate('description', 'ar'),
                    ],
                    'en'       => [
                        'name'             => $child->translate('name', 'en'),
                        'description'      => $child->translate('description', 'en'),
                        'meta_title'       => $child->translate('name', 'en'),
                        'meta_description' => $child->translate('description', 'en'),
                        'meta_keywords'    => $child->translate('name', 'en') . ' ' . $child->translate('description', 'ar'),
                    ],
                ]);
            });
        });
    }
}
