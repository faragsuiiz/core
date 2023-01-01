<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToCategoryFilterRecurringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_filter_recurring', function (Blueprint $table) {
            $table->index('category_id');
            $table->index('filter_recurring_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_filter_recurring', function (Blueprint $table) {
            $table->dropIndex('medias_category_id_index');
            $table->dropIndex('medias_filter_recurring_id_index');
        });
    }
}
