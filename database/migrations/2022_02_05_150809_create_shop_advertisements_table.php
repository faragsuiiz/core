<?php

use App\Enums\ShopAdvertisementType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_advertisements', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ShopAdvertisementType::getValues());
            $table->string('link')->nullable();
            $table->unsignedBigInteger('position')->default(0);
            $table->dateTime('expires_at')->nullable();
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
        Schema::dropIfExists('shop_advertisements');
    }
}
