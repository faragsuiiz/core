<?php

use App\Models\Shop\Attribute;
use App\Models\Shop\ShopProduct;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->nullable();
            $table->text('text_value')->nullable();
            $table->boolean('boolean_value')->nullable();
            $table->integer('integer_value')->nullable();
            $table->decimal('float_value', 12, 4)->nullable();
            $table->dateTime('datetime_value')->nullable();
            $table->date('date_value')->nullable();
            $table->json('json_value')->nullable();
            $table->foreignIdFor(ShopProduct::class)->constrained('shop_products');
            $table->foreignIdFor(Attribute::class)->constrained('shop_attributes');
            $table->unique(['locale', 'attribute_id', 'shop_product_id'], 'locale_attribute_value_index_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_product_attribute_values');
    }
}
