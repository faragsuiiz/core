<?php

namespace Database\Factories\Shop;

use App\Models\Shop\ShopCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'position'         => '',
            'image'            => '',
            'status'           => '',
            'display_mode'     => '',
            'additional'       => '',

            'name'             => '',
            'slug'             => '',
            'description'      => '',
            'meta_title'       => '',
            'meta_description' => '',
            'meta_keywords'    => '',
            'category_id'      => '',
            'locale'           => '',
        ];
    }
}
