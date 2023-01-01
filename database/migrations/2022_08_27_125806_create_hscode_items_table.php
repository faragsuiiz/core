<?php

use App\Models\HsCodeChapter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hscode_items', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();
            $table->string('title');
            $table->string('description')->fulltext();
            $table->json('instructions')->nullable();
            $table->json('taxes')->nullable();

            $table->foreignIdFor(HsCodeChapter::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hscode_items');
    }
};
