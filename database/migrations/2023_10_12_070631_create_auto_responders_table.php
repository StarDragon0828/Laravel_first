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
        Schema::create('auto_responders', function (Blueprint $table) {
            $table->id();
            $table->string('session');
            $table->string('keyword');
            $table->integer('percentage')->default(100);
            $table->string('response')->nullable();
            $table->string('response_file')->nullable();
            $table->timestamps();

            // Define a foreign key constraint with cascade delete
            $table->foreign('session')->references('session_name')->on('whatsapp_instances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auto_responders');
    }
};
