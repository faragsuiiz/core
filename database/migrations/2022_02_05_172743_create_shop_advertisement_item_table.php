<?php

use App\Models\Shop\Advertisement;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopAdvertisementItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_advertisement_item', function (Blueprint $table) {
            $table->foreignIdFor(Advertisement::class)->constrained('shop_advertisements');
            $table->morphs('item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_advertisement_item');
    }
}
