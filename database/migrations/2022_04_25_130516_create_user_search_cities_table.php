<?php

use App\Models\UserSearch;
use App\Models\World\Place;
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
        Schema::create('user_search_cities', function (Blueprint $table) {
            $table->foreignIdFor(UserSearch::class)->onDelete('cascade');
            $table->foreignIdFor(Place::class, 'city_id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_search_cities');
    }
};
