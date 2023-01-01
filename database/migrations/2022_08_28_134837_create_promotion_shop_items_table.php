<?php

use App\Enums\DiscountType;
use App\Enums\PromotionPackageType;
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
        Schema::create('promotion_shop_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('duration');
            $table->unsignedInteger('ads_quota')->default(1);
            $table->unsignedInteger('price');
            $table->enum('type', PromotionPackageType::getValues());
            $table->unsignedInteger('discount')->nullable();
            $table->enum('discount_type', DiscountType::getValues())->default(DiscountType::NONE);
            $table->boolean('visible')->default(true);
            $table->unsignedInteger('expires_in_days')->nullable();
            $table->string('image')->nullable();

            $table->foreignId('package_id')->constrained('promotion_shop_packages')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('promotion_shop_items');
    }
};
