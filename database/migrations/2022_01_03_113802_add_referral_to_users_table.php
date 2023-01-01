<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferralToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('referred_by')->nullable()->index();
            $table->string('affiliate_code')->nullable()->unique();
            $table->string('affiliate_link')->nullable();
            $table->integer('points')->nullable(false)->default(0)->change();
            $table->dropColumn('marketer_code_id');
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
            $table->dropColumn('referred_by');
            $table->dropColumn('affiliate_code');
            $table->dropColumn('affiliate_link');
            $table->integer('points')->nullable(true)->change();
            $table->biginteger('marketer_code_id')->nullable();
        });
    }
}
