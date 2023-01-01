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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['governorate_id']);
            $table->json('city_name')->nullable()->after('state_id')->change();
            $table->json('state_name')->nullable()->after('city_name');
            $table->json('country_name')->nullable()->after('state_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['state_name', 'country_name']);
            $table->unsignedBigInteger('governorate_id')->nullable();
        });
    }
};
