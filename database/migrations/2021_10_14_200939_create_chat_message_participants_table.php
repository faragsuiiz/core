<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatMessageParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_message_participants', function (Blueprint $table) {
            $table->dateTime('seen_at')->nullable();
            $table->dateTime('received_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('message_id')->constrained('chat_messages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_message_participants');
    }
}
