<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUnusedAttributesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fcm_token');
            $table->dropColumn('mobile_type');
            $table->dropColumn('provider_id');
            $table->dropColumn('provider');
            $table->dropColumn('api_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('fcm_token')->nullable();
            $table->enum('mobile_type', array('android', 'ios'));
            $table->string('provider_id')->nullable();
            $table->string('provider')->nullable();
            $table->string('api_token')->nullable();
        });
    }
}
