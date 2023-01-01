<?php

use App\Enums\DiscountType;
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
        Schema::create('promotion_shop_packages', function (Blueprint $table) {
            $table->id();

            $table->json('name');
            $table->json('description');
            $table->boolean('visible')->default(true);
            $table->string('image')->nullable();
            $table->decimal('discount', 12)->default(0);
            $table->enum('discount_type', DiscountType::getValues())->default(DiscountType::NONE);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_shop_packages');
    }
};
