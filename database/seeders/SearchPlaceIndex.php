<?php

namespace Database\Seeders;

use App\Models\World\Place;
use Illuminate\Database\Seeder;
use MeiliSearch\Client as MeiliSearch;
use App\Scout\MeiliSearch as ScoutMeiliSearch;

class SearchPlaceIndex extends Seeder
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

        $index = Place::make()->searchableAs();

        /**
         * @var \MeiliSearch\Endpoints\Indexes
         */
        $index = $meiliSearch->index($index);
        // dd($index->getRankingRules());

        $index->updateSearchableAttributes(['asciiname', 'preferred_names', 'alternatenames']);
        $index->updateSortableAttributes(['id']);
        $index->updateRankingRules(['sort', 'words', 'typo', 'proximity', 'attribute', 'exactness']);
        $index->updateFilterableAttributes(['id', 'fcode', 'country', 'latitude', 'longitude', 'admin1', 'parent_id']);

        $this->command->call('scout:flush', ['model' => Place::class]);
        $this->command->call('scout:import', ['model' => Place::class]);
    }
}
