<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use MeiliSearch\Client as MeiliSearch;

class SearchProductIndex extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meiliSearch = app()->make(MeiliSearch::class);
        $index = Product::make()->searchableAs();

        /**
         * @var \MeiliSearch\Endpoints\Indexes
         */
        $index = $meiliSearch->index($index);

        // $this->command->call('scout:flush', ['model' => Product::class]);
        Product::whereNotNull('indexed_at')->update(['indexed_at' => null]);

        $index->updateSearchableAttributes(['name', 'description']);
        $index->updateSortableAttributes(['id', 'created_at', 'updated_at', 'price', 'final_price', 'is_pinned', 'position']);
        $index->updateRankingRules(['sort', 'words', 'typo', 'proximity', 'attribute', 'exactness']);
        $index->updateFilterableAttributes(['id', 'status', 'country_id', 'state_id', 'category_id', 'city_id', 'sub_filters_array', 'category_breadcrumbs_ids', 'price', 'final_price', 'hs_code', 'is_pinned', 'is_promoted', 'business_profile_id']);

        // $this->command->call('scout:import', ['model' => Product::class]);
    }
}
