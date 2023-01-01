<?php

namespace Database\Seeders;

use FilesystemIterator;
use App\Models\HsCodeItem;
use App\Models\HsCodeChapter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HsCodeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        DB::table('hscode_items')->truncate();

        DB::transaction(function () {
            HsCodeChapter::query()
                ->get(['id', 'code'])
                ->each(function ($chapter) {
                    $filesCount = new FilesystemIterator(base_path("hscodes/clauses/{$chapter->code}"));
                    $filesCount = iterator_count($filesCount);

                    for ($index = 0; $index < $filesCount; $index++) {
                        $file = $index + 1;
                        $now = now();

                        $records = json_decode(file_get_contents(base_path("hscodes/clauses/{$chapter->code}/{$file}.json")), true);

                        $records = array_map(function ($record) use ($chapter, $now, $file) {
                            try {
                                return [
                                    'code'               => $record['code'],
                                    'title'              => $record['title'],
                                    'description'        => $record['description'],
                                    'instructions'       => json_encode($record['instructions']),
                                    'taxes'              => json_encode($record['taxes']),
                                    'hs_code_chapter_id' => $chapter->id,
                                    'created_at'         => $now,
                                    'updated_at'         => $now,
                                ];
                            } catch (\Throwable$th) {
                                dump(base_path("hscodes/clauses/{$chapter->code}/{$file}.json"));
                                dd($record);
                            }
                        }, $records);

                        HsCodeItem::insert($records);
                    }
                });
        });
    }
}
