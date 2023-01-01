<?php

use App\Enums\UserSearchType;
use App\Models\User;
use App\Models\Category;
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
        Schema::create('user_searches', function (Blueprint $table) {
            $table->id();
            $table->json('data');
            $table->string('search')->nullable();
            $table->string('price_range')->nullable();
            $table->string('country_id')->index()->nullable();
            $table->unsignedBigInteger('state_id')->index()->nullable();
            $table->enum('type', UserSearchType::getValues())->default(UserSearchType::RECENT)->index();
            $table->foreignIdFor(Category::class)->constrained('categories')->onDelete('cascade');
            $table->foreignIdFor(User::class)->constrained('users')->onDelete('cascade');
            $table->index(['type', 'user_id']);
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
        Schema::dropIfExists('user_searches');
    }
};
