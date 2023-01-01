<?php

use App\Models\User;
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
        Schema::create('user_app_ratings', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('stars')->nullable();
            $table->string('username');
            $table->text('review')->nullable();
            $table->json('avatar_links')->nullable();
            $table->boolean('is_featured')->default(false);

            $table->foreignIdFor(User::class)->nullable()->constrained('users')->onDelete('set null');

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
        Schema::dropIfExists('user_app_ratings');
    }
};
