<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatConversationParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_conversation_participants', function (Blueprint $table) {
            $table->boolean('is_creator')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('conversation_id')->constrained('chat_conversations')->onDelete('cascade');
            $table->dateTime('joined_at');
            $table->dateTime('silence_ends_at')->nullable();
            $table->dateTime('starred_at')->nullable();
            $table->dateTime('pinned_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_conversation_participants');
    }
}
