<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('filters_recurring', function (Blueprint $table) {
            $table->boolean('multiple_choice')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('filters_recurring', function (Blueprint $table) {
            $table->dropColumn(['multiple_choice']);
        });
    }
};
