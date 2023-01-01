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
        Schema::table('user_business_profiles', function (Blueprint $table) {
            $table->json('package')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('expires_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_business_profiles', function (Blueprint $table) {
            $table->dropColumn(['package', 'approved_at', 'expires_at']);
        });
    }
};
