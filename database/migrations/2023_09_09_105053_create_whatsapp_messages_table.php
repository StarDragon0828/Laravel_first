<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('whatsapp_messages', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp_user_id', 36);
            $table->unsignedBigInteger('sender_id');
            $table->string('messageText')->nullable();
            $table->string('messageMedia')->nullable();
            $table->string('messageDocument')->nullable();
            $table->string('messageRecording')->nullable();
            $table->string('messageTime');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        
            // Define foreign key constraint with cascading delete
            $table->foreign('whatsapp_user_id')->references('id')->on('whatsapp_contacts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whatsapp_messages');
    }
};
