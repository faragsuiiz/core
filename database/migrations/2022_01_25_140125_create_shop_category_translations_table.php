<?php

use App\Models\Shop\ShopCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_category_translations', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->foreignIdFor(ShopCategory::class)->constrained();
            $table->string('locale');
            $table->unique(['shop_category_id', 'slug', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_category_translations');
    }
}
