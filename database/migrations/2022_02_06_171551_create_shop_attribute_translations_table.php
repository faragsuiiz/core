<?php

use App\Models\Shop\Attribute;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopAttributeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_attribute_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Attribute::class)->constrained('shop_attributes');
            $table->string('locale');
            $table->unique(['attribute_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_attribute_translations');
    }
}
