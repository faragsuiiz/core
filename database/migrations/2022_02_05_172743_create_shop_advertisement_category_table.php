<?php

use App\Models\Shop\Advertisement;
use App\Models\Shop\ShopCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopAdvertisementCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_advertisement_category', function (Blueprint $table) {
            $table->foreignIdFor(Advertisement::class)->constrained('shop_advertisements');
            $table->foreignIdFor(ShopCategory::class)->constrained('shop_categories');

            $table->index('advertisement_id', 'shop_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_advertisement_category');
    }
}
