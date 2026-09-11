<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('sosmeds', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')
        ->constrained()
        ->cascadeOnDelete();
      $table->string('github')->nullable();
      $table->string('linkedin')->nullable();
      $table->string('threads')->nullable();
      $table->string('instagram')->nullable();
      $table->string('x')->nullable();
      $table->string('facebook')->nullable();
      $table->string('tiktok')->nullable();
      $table->timestamps();

      $table->unique(['user_id']);
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('sosmeds');
  }
};
