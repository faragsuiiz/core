<?php

use App\Models\Shop\Advertisement;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAdvertisementTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_advertisement_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Advertisement::class)->constrained('shop_advertisements');
            $table->string('locale');
            $table->unique(['advertisement_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_advertisement_translations');
    }
}
