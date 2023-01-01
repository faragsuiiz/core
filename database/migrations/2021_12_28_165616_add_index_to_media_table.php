<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->index('model_id');
            $table->index('model_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropIndex('media_model_id_index');
            $table->dropIndex('media_model_type_index');
        });
    }
}
