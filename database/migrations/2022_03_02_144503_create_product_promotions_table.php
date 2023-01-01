<?php

use App\Models\Product;
use App\Enums\ProductPromotionStatus;
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
        Schema::create('product_promotions', function (Blueprint $table) {
            $table->id();
            $table->date('starts_at')->index();
            $table->date('ends_at')->index();
            $table->unsignedInteger('paid_coins');
            $table->boolean('is_pinned')->default(false);
            $table->json('categories');
            $table->json('cost_details');
            $table->enum('status', ProductPromotionStatus::getValues())->default(ProductPromotionStatus::INACTIVE);
            $table->foreignIdFor(Product::class)->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp('cancelled_at')->nullable();
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
        Schema::dropIfExists('product_promotions');
    }
};
