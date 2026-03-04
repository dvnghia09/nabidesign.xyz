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
        Schema::create('contacts', function (Blueprint $col) {
            $col->id();
            $col->string('name');
            $col->string('email');
            $col->string('phone')->nullable();
            $col->string('subject')->nullable();
            $col->text('message');
            $col->boolean('status')->default(0); // 0: unread, 1: read
            $col->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
