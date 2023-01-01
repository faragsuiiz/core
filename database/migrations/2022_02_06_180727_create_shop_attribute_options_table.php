<?php

use App\Models\Shop\Attribute;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAttributeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_attribute_options', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Attribute::class)->constrained('shop_attributes');
            $table->unsignedBigInteger('position')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_attribute_options');
    }
}
