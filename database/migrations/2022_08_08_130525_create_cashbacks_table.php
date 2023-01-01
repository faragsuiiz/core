<?php

use App\Enums\CashbackStatus;
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
        Schema::create('cashbacks', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('amount');
            $table->enum('status', CashbackStatus::getValues())->default(CashbackStatus::WAITING_FOR_REVIEW)->index();
            $table->text('approval_note')->nullable();
            $table->string('buyer_mobile_number')->nullable();
            $table->string('buyer_national_id')->nullable();
            $table->string('buyer_national_card_front_side')->nullable();
            $table->string('buyer_national_card_back_side')->nullable();
            $table->string('seller_mobile_number')->nullable();
            $table->string('seller_national_id')->nullable();
            $table->string('seller_national_card_front_side')->nullable();
            $table->string('seller_national_card_back_side')->nullable();
            $table->string('buyer_transaction_id')->nullable();
            $table->string('seller_transaction_id')->nullable();
            $table->json('summary')->nullable();
            $table->foreignId('seller_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('buyer_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained('archived_products')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('cashbacks');
    }
};
