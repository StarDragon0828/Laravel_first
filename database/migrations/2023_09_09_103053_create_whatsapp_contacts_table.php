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
        Schema::create('whatsapp_contacts', function (Blueprint $table) {
            $table->string('id', 36)->unique();
            $table->unsignedBigInteger('instance_id');
            $table->unsignedBigInteger('phone');
            $table->string('username');
            $table->string('profile')->default('https://i.ibb.co/6WgZryJ/default.png');
            $table->timestamp('lastMessageTime')->nullable();
            $table->timestamps();
            
            // Define foreign key constraint with cascading delete
            $table->foreign('instance_id')->references('id')->on('whatsapp_instances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whatsapp_contacts');
    }
};
