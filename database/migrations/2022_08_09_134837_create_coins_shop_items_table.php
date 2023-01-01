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
        Schema::create('coins_shop_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('coins_count');
            $table->decimal('price', 12);
            $table->decimal('discount', 12)->default(0);
            $table->enum('discount_type', DiscountType::getValues())->nullable();
            $table->string('image')->nullable();
            $table->boolean('visible')->default(true);
            $table->foreignId('package_id')->constrained('coins_shop_packages')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('coins_shop_items');
    }
};
