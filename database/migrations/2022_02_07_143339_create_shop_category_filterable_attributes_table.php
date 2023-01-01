<?php

use App\Models\Shop\Attribute;
use App\Models\Shop\ShopCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopCategoryFilterableAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_category_filterable_attributes', function (Blueprint $table) {
            $table->foreignIdFor(ShopCategory::class)->constrained('shop_categories');
            $table->foreignIdFor(Attribute::class)->constrained('shop_attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_category_filterable_attributes');
    }
}
