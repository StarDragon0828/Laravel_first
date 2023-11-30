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
        Schema::create('whatsapp_instances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('session_name')->unique();
            $table->unsignedBigInteger('instance_phone')->nullable();
            $table->string('instance_username')->nullable();
            $table->string('instance_profile')->default('https://i.ibb.co/fvwyFZJ/Admin-LTELogo.png');
            $table->string('qr_code')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('speed')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whatsapp_instances');
    }
};
