<?php

use App\Models\Shop\ShopProduct;
use App\Models\Shop\ShopCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_categories', function (Blueprint $table) {
            $table->foreignIdFor(ShopCategory::class)->constrained('shop_categories');
            $table->foreignIdFor(ShopProduct::class)->constrained('shop_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_categories');
    }
}
