<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('type');
            $table->unsignedBigInteger('position')->nullable();
            $table->boolean('is_required')->default(0);
            $table->boolean('is_filterable')->default(0);
            $table->boolean('is_comparable')->default(0);
            $table->boolean('is_unique')->default(0);
            $table->boolean('is_user_defined')->default(1);

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
        Schema::dropIfExists('shop_attributes');
    }
}
