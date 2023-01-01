<?php

namespace Database\Factories\Shop;

use Illuminate\Support\Arr;
use App\Models\Organization;
use App\Models\Shop\ShopProduct;
use App\Models\Shop\ShopCategory;
use App\Models\Shop\ShopProductFlat;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopProduct::class;

    /**
     * @var array
     */
    static $viedos = [
        'https://www.youtube.com/watch?v=SmVDnMP3sWk',
        'https://www.youtube.com/watch?v=MNeX4EGtR5Y',
        'https://www.youtube.com/watch?v=tC9N_9E9EIg',
        'https://www.youtube.com/watch?v=JtVzWKvqs-c',
        'https://www.youtube.com/watch?v=5ItKCmsdxIM',
        'https://www.youtube.com/watch?v=IXnRd7o8Oi8',
        'https://www.youtube.com/watch?v=UaVJdvT0cIo',
        'https://www.youtube.com/watch?v=esWNE9IzqVo',
        'https://www.youtube.com/watch?v=UIRo3f-B9zY',
        'https://www.youtube.com/watch?v=G07FcRhYB2c',
        'https://www.youtube.com/watch?v=5rV1FX4yS90',
        'https://www.youtube.com/watch?v=BrTquLppgNM',
        'https://www.youtube.com/watch?v=gBdK_rAIibE',
        'https://www.youtube.com/watch?v=S9ok1QeHFNA',
        'https://www.youtube.com/watch?v=cDP4NA5Bqb4',
        'https://www.youtube.com/watch?v=EqzUcMzfV1w',
        'https://www.youtube.com/watch?v=OvSzLjkMmQo',
        'https://www.youtube.com/watch?v=g-0B_Vfc9qM',
        'https://www.youtube.com/watch?v=-8LTPIJBGwQ',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku'        => $this->faker->unique()->swiftBicNumber(),
            'additional' => null,
            'owner_type' => Organization::class,
            'owner_id'   => Organization::inRandomOrder()->first()->id,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (ShopProduct $product) {
            $product->attributeValues()->create([
                ''
            ]);

            // Product Flats
            ShopProductFlat::factory()
                ->for($product)
                ->create([
                    'locale'     => 'en',
                    'owner_id'   => $product->owner_id,
                    'owner_type' => $product->owner_type,
                    'media'      => [
                        'images' => [
                            'large'  => $product->images->urls('large'),
                            'medium' => $product->images->urls('medium'),
                            'thumb'  => $product->images->urls('thumb'),
                        ],
                        'videos' => $product->images->urls(),
                    ],
                ]);

            ShopProductFlat::factory()
                ->for($product)
                ->create([
                    'locale'     => 'ar',
                    'owner_id'   => $product->owner_id,
                    'owner_type' => $product->owner_type,
                    'media'      => [
                        'images' => [
                            'large'  => $product->images->urls('large'),
                            'medium' => $product->images->urls('medium'),
                            'thumb'  => $product->images->urls('thumb'),
                        ],
                        'videos' => $product->images->urls(),
                    ],
                ]);

            // Product Categories
            $product->categories()->sync(ShopCategory::inRandomOrder()->limit(5)->get(['id'])->pluck(['id'])->toArray());

            $product->update([
                // Product Images
                'images' => collect(range(0, 1))->map(function () {
                    return $this->faker->imageUrl();
                })->toArray(),
                // Product Videos
                'videos' => collect(range(0, 1))->map(function () {
                    return static::$viedos[array_rand(static::$viedos)];
                })->toArray(),
            ]);
        });
    }
}
