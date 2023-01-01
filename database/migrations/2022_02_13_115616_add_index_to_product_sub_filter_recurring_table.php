<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToProductSubFilterRecurringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_sub_filter_recurring', function (Blueprint $table) {
            $table->index(['product_id', 'sub_filter_recurring_id'], 'product_id_sub_filter_id_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_sub_filter_recurring', function (Blueprint $table) {
            $table->dropIndex('product_id_sub_filter_id_index');
        });
    }
}
