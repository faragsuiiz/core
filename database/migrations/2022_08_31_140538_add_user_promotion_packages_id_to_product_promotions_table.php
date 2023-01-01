<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_promotions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_promotion_packages_id')->nullable();

            $table->foreign('user_promotion_packages_id', 'product_promotions_user_packages_id')->references('id')->on('user_promotion_packages')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_promotions', function (Blueprint $table) {
            $table->dropForeign('product_promotions_user_packages_id');
            $table->dropColumn(['user_promotion_packages_id']);
        });
    }
};
