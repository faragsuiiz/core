<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToOauthAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oauth_access_tokens', function (Blueprint $table) {
            $table->index('revoked');
            $table->index('client_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oauth_access_tokens', function (Blueprint $table) {
            $table->dropIndex('oauth_access_tokens_revoked_index');
            $table->dropIndex('oauth_access_tokens_client_id_index');
        });
    }
}
