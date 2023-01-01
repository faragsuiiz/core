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
            $table->after('user_id', function (Blueprint $table) {
                $table->unsignedBigInteger('business_profile_id')->nullable()->index();
                $table->json('business_profile')->nullable();
            });
        });

        Schema::table('archived_products', function (Blueprint $table) {
            $table->after('user_id', function (Blueprint $table) {
                $table->unsignedBigInteger('business_profile_id')->nullable()->index();
                $table->json('business_profile')->nullable();
            });
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
            $table->dropColumn(['business_profile', 'business_profile_id']);
        });

        Schema::table('archived_products', function (Blueprint $table) {
            $table->dropColumn(['business_profile', 'business_profile_id']);
        });
    }
};
