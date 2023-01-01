<?php

namespace Database\Seeders;

use App\Models\HsCodeItem;
use Illuminate\Database\Seeder;
use MeiliSearch\Client as MeiliSearch;

class SearchHsCodeItemIndex extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meiliSearch = app()->make(MeiliSearch::class);
        $index = HsCodeItem::make()->searchableAs();

        /**
         * @var \MeiliSearch\Endpoints\Indexes
         */
        $index = $meiliSearch->index($index);

        $index->updateSearchableAttributes(['code', 'normalized_title', 'normalized_description']);
        $index->updateFilterableAttributes(['hs_code_chapter_id']);
        $index->updateRankingRules(['sort', 'words', 'typo', 'proximity', 'attribute', 'exactness']);

        $this->command->call('scout:flush', ['model' => HsCodeItem::class]);
        $this->command->call('scout:import', ['model' => HsCodeItem::class]);
    }
}
