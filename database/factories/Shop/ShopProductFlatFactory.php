<?php

namespace Database\Factories\Shop;

use App\Models\Shop\Attribute;
use App\Models\Shop\ShopProductFlat;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopProductFlatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopProductFlat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $priceRange = [100, 99999];

        return [
            'sku'                => $this->faker->unique()->swiftBicNumber(),
            'name'               => $name = $this->faker->words(rand(3, 10), true),
            'status'             => $this->faker->boolean,
            'description'        => $this->faker->sentence(10),
            'short_description'  => $this->faker->sentence(3),
            'price'              => number_format($this->faker->randomFloat(2, $priceRange[0], $priceRange[1]), 2),
            'cost'               => number_format($this->faker->randomFloat(2, $priceRange[0] - 50, $priceRange[1] - 500), 2),
            'special_price'      => number_format($this->faker->randomFloat(2, $priceRange[0] - 100, $priceRange[1] - 1000), 2),
            'special_price_from' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'special_price_to'   => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'meta_title'         => $name,
            'meta_keywords'      => $this->faker->words(rand(10, 20), true),
            'meta_description'   => $this->faker->sentence(10),
            'length'             => (string) rand(10, 5000),
            'width'              => (string) rand(10, 5000),
            'height'             => (string) rand(10, 1000),
            'weight'             => (string) rand(10, 50),
            'new'                => $this->faker->boolean,
            'featured'           => $this->faker->boolean,
            'locale'             => $this->faker->randomElement(['ar', 'en']),
            'color'              => optional(optional(Attribute::with(['options'])->whereCode('color')->first())->options)->shuffle()->first(),
            'size'               => optional(optional(Attribute::with(['options'])->whereCode('size')->first())->options)->shuffle()->first(),
            'brand'              => optional(optional(Attribute::with(['options'])->whereCode('brand')->first())->options)->shuffle()->first(),
        ];
    }
}
