<?php

use App\Models\Shop\ShopProduct;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductFlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_flat', function (Blueprint $table) {
            $table->id();

            $table->json('media')->nullable();
            $table->string('locale');
            $table->foreignIdFor(ShopProduct::class)->constrained();
            $table->morphs('owner');

            $table->unique(['shop_product_id', 'locale'], 'product_flat_unique_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_flat');
    }
}
