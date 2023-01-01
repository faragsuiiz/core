<?php

namespace Database\Seeders;

use App\Models\World\Country;
use Illuminate\Database\Seeder;
use MeiliSearch\Client as MeiliSearch;
use App\Scout\MeiliSearch as ScoutMeiliSearch;

class SearchCountryIndex extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScoutMeiliSearch::setConfigFor('geo');

        $meiliSearch = app()->make(MeiliSearch::class);

        $index = Country::make()->searchableAs();

        /**
         * @var \MeiliSearch\Endpoints\Indexes
         */
        $index = $meiliSearch->index($index);

        $index->updateSearchableAttributes(['name', 'iso_alpha2']);
        // $index->updateSortableAttributes(['id', 'created_at', 'updated_at', 'price', 'is_pinned', 'position']);
        // $index->updateRankingRules(['sort', 'words', 'typo', 'proximity', 'attribute', 'exactness']);
        // $index->updateFilterableAttributes(['id', 'status', 'country_id', 'state_id', 'category_id', 'city_id', 'sub_filters_array', 'category_breadcrumbs_ids', 'price', 'hs_code', 'favourites', 'is_pinned']);

        $this->command->call('scout:flush', ['model' => Country::class]);
        $this->command->call('scout:import', ['model' => Country::class]);
    }
}
