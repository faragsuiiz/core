<?php

namespace Database\Factories\Shop;

use App\Models\Organization;
use App\Models\Shop\ShopCategory;
use App\Models\Shop\Advertisement;
use App\Enums\ShopAdvertisementType;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertisement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image'      => $this->faker->imageUrl,
            'type'       => $type = ShopAdvertisementType::getRandomValue(),
            'link'       => $type === ShopAdvertisementType::EXTERNAL_LINK ? $this->faker->url : null,
            'expires_at' => $this->faker->dateTimeBetween('-1 month', '+12 months'),
            'ar'         => [
                'name' => $this->faker->words(3, true),
            ],
            'en'         => [
                'name' => $this->faker->words(3, true),
            ],
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Advertisement $advertisement) {
            $advertisement->shopCategories()->sync($categories = ShopCategory::inRandomOrder()->take(3)->get());

            if ($advertisement->type->is(ShopAdvertisementType::SHOP_CATEGORIES)) {
                $advertisement->shopCategoriesItems()->sync($categories);
                return;
            }

            // TODO:
            // if ($advertisement->type->is(ShopAdvertisementType::SHOP_PRODUCTS)) {
            //     $advertisement->shopProducts()->sync(ShopCategory::inRandomOrder()->take(2)->get());
            //     return;
            // }

            if ($advertisement->type->is(ShopAdvertisementType::ORGANIZATION)) {
                $advertisement->organization()->sync(Organization::inRandomOrder()->first());
                return;
            }
        });
    }
}
