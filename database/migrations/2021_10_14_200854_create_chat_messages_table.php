<?php

use App\Enums\ChatMessageType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->text('body')->nullable();
            $table->enum('type', ChatMessageType::getValues());
            $table->foreignId('sender_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('conversation_id')->constrained('chat_conversations')->onDelete('cascade');
            $table->foreignId('replied_message_id')->nullable()->constrained('chat_messages')->onDelete('cascade');
            $table->foreignId('forwarded_message_id')->nullable()->constrained('chat_messages')->onDelete('cascade');
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
        Schema::dropIfExists('chat_messages');
    }
}
