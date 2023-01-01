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
        Schema::create('user_business_profiles_categories', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->unsignedBigInteger('user_business_profile_id');
            $table->foreign('user_business_profile_id', 'user_business_profile_id_categories_foreign')->references('id')->on('user_business_profiles')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_business_profiles_categories');
    }
};
