<?php

namespace Database\Seeders\Shop;

use Illuminate\Support\Arr;
use App\Models\Organization;
use App\Models\Shop\Attribute;
use Illuminate\Database\Seeder;

class AttributeOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            [
                'attribute_code' => 'color',
                'name:ar'        => 'أحمر',
                'name:en'        => 'Red',
            ],
            [
                'attribute_code' => 'color',
                'name:ar'        => 'أخضر',
                'name:en'        => 'Green',
            ],
            [
                'attribute_code' => 'color',
                'name:ar'        => 'أصفر',
                'name:en'        => 'Yellow',
            ],
            [
                'attribute_code' => 'color',
                'name:ar'        => 'Black',
                'name:en'        => 'Black',
            ],
            [
                'attribute_code' => 'color',
                'name:ar'        => 'أبيض',
                'name:en'        => 'White',
            ],
            [
                'attribute_code' => 'size',
                'name:ar'        => 'S',
                'name:en'        => 'S',
                'position'       => '1',
            ],
            [
                'attribute_code' => 'size',
                'name:ar'        => 'M',
                'name:en'        => 'M',
                'position'       => '2',
            ],
            [
                'attribute_code' => 'size',
                'name:ar'        => 'L',
                'name:en'        => 'L',
                'position'       => '3',
            ],
            [
                'attribute_code' => 'size',
                'name:ar'        => 'XL',
                'name:en'        => 'XL',
                'position'       => '4',
            ],
        ];

        foreach ($options as $option) {
            if ($attribute = Attribute::whereCode($option['attribute_code'])->first()) {
                $attribute->options()
                          ->create(Arr::except($option, ['attribute_code']));
            }
        }

        if ($attribute = Attribute::whereCode('brand')->first()) {
            Organization::inRandomOrder()->take(10)->get()->each(function ($brand, $index) use ($attribute) {
                $attribute->options()->create([
                    'name:ar'        => $brand->translate('name', 'ar'),
                    'name:en'        => $brand->translate('name', 'en'),
                    'position'       => $index,
                ]);
            });

        }
    }
}
