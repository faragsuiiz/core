<?php

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
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('for_agencies_only')->default(false);
            $table->json('breadcrumbs_ids')->nullable();
            $table->json('breadcrumbs_names')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn([
                'for_agencies_only',
                'breadcrumbs_ids',
                'breadcrumbs_names',
            ]);
        });
    }
};
