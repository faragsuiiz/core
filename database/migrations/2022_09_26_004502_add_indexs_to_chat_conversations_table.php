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
        Schema::table('chat_conversations', function (Blueprint $table) {
            $table->json('product_data')->nullable();
        });
        Schema::table('chat_conversation_participants', function (Blueprint $table) {
            $table->dateTime('last_message_at')->nullable()->default(now())->index();
            $table->unsignedInteger('unread_messages_count')->default(0);
            $table->index(['conversation_id', 'last_message_at'], 'chat_conversation_partics_conv_id_last_mess_index');
            $table->index(['user_id', 'last_message_at'], 'chat_conversation_partics_user_id_last_mess_index');
        });
        Schema::table('chat_message_participants', function (Blueprint $table) {
            $table->index(['user_id', 'seen_at']);
            $table->index(['user_id', 'received_at']);
        });
        Schema::table('chat_messages', function (Blueprint $table) {
            $table->index(['conversation_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chat_conversations', function (Blueprint $table) {
            $table->dropColumn('product_data');
        });
        Schema::table('chat_conversation_participants', function (Blueprint $table) {
            $table->dropIndex('chat_conversation_partics_conv_id_last_mess_index');
            $table->dropIndex('chat_conversation_partics_user_id_last_mess_index');
            $table->dropColumn(['last_message_at', 'unread_messages_count']);
        });
        Schema::table('chat_message_participants', function (Blueprint $table) {
            $table->dropIndex('chat_message_participants_user_id_seen_at_index');
            $table->dropIndex('chat_message_participants_user_id_received_at_index');
        });
        Schema::table('chat_messages', function (Blueprint $table) {
            $table->dropIndex('chat_messages_conversation_id_index');
        });
    }
};
