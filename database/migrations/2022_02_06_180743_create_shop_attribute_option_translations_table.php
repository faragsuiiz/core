<?php

use App\Models\Shop\AttributeOption;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAttributeOptionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_attribute_option_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(AttributeOption::class)->constrained('shop_attribute_options');
            $table->string('locale');
            $table->unique(['attribute_option_id', 'locale'], 'attribute_option_trans_attribute_option_id_locale_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_attribute_option_translations');
    }
}
