<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivedProductSubFilterRecurringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archived_product_sub_filter_recurring', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('sub_filter_recurring_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archived_product_sub_filter_recurring');
    }
}
