<?php

namespace Database\Seeders;

use Illuminate\Support\Arr;
use App\Models\HsCodeChapter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HsCodeChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        DB::table('hscode_chapters')->truncate();

        DB::transaction(function () {
            for ($index = 0; $index < 10; $index++) {
                $file = $index * 10;
                $now = now();

                $records = json_decode(file_get_contents(base_path("hscodes/chapters/{$file}.json")), true);
                $records = array_map(fn($record) => Arr::only($record, ['code', 'name']) + [
                    'created_at' => $now,
                    'updated_at' => $now,
                ], $records);

                HsCodeChapter::insert($records);
            }
        });
    }
}
