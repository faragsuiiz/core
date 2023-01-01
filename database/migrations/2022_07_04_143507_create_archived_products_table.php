<?php

use App\Models\ProductPromotion;
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
        Schema::create('archived_products', function (Blueprint $table) {
            $table->id();
            $table->longText('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->longtext('note')->nullable();
            $table->longtext('description')->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->integer('organization_id')->unsigned()->nullable();
            $table->string('organization_name')->nullable();
            $table->bigInteger('category_id');
            $table->enum('status', array('approve', 'disapprove', 'pennding', 'finished', 'promoted', 'temp'))->default('approve');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('contact')->unsigned();
            $table->string('link')->nullable();
            $table->string('shareable_link')->default('https://suiiz.com');
            $table->json('featured_image')->nullable();
            $table->json('images')->nullable();
            $table->decimal('discount', 12)->nullable();
            $table->double('price');
            $table->bigInteger('count_chat')->unsigned()->default(0);
            $table->bigInteger('count_phone')->unsigned()->default(0);
            $table->bigInteger('count_view')->unsigned()->default(0);
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('position');
            $table->tinyinteger('byadmin')->defualt(0);

            $table->tinyinteger('verify_phone')->default(0);
            $table->string('pin_code')->nullable();
            $table->longtext('rejected_reason')->nullable();
            $table->bigInteger('marketer_code_id')->nullable();
            $table->json('city_name')->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->string('country_id')->index()->nullable();
            $table->json('country_name')->nullable();
            $table->unsignedBigInteger('state_id')->index()->nullable();
            $table->json('state_name')->nullable();
            $table->foreignIdFor(ProductPromotion::class, 'promotion_id')->nullable()->constrained('product_promotions');
            $table->boolean('is_pinned')->default(false);
            $table->text('delete_note')->nullable();

            $table->index('category_id');
            $table->index('created_at');
            $table->index('updated_at');
            $table->index('price');
            $table->index('position');
            $table->index('status');
            $table->index('user_id');
            $table->index(['position', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archived_products');
    }
};
