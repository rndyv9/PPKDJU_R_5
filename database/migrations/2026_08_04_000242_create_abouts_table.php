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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->date('birthday');
            $table->string('email', 50);
            $table->string('address', 255);
            $table->string('postal_code', 5);
            $table->string('description', 255)->nullable();
            $table->string('telp', 15);
            $table->string('file', 100)->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('linkedin', 100)->nullable();
            $table->string('porto', 100)->nullable();
            $table->string('github', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
