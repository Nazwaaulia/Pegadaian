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
        Schema::create('pegadaians', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('name');
            $table->unsignedSmallInteger('age');
            $table->string('email');
            $table->string('phone');
            $table->string('item');
            $table->string('image');
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->string('shop_location')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegadaians');
    }
};
