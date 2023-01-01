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
        Schema::table('platforms', function (Blueprint $table) {
            $table->string('ip')->after('os')->nullable()->index();
            $table->string('fingerprint')->after('ip')->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('platforms', function (Blueprint $table) {
            $table->dropColumn(['ip', 'fingerprint']);
        });
    }
};
