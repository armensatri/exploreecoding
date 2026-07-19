<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('path_view', function (Blueprint $table) {
      $table->id();
      $table->foreignId('path_id')
        ->constrained()
        ->cascadeOnDelete();
      $table->foreignId('user_id')
        ->constrained()
        ->cascadeOnDelete();
      $table->string('path_name');
      $table->timestamps();

      $table->unique(['path_id', 'user_id']);
    });

    Schema::create('tipscoding_view', function (Blueprint $table) {
      $table->id();
      $table->foreignId('tipscoding_id')
        ->constrained()
        ->cascadeOnDelete();
      $table->foreignId('user_id')
        ->constrained()
        ->cascadeOnDelete();
      $table->string('tipscoding_title');
      $table->timestamps();

      $table->unique(['tipscoding_id', 'user_id']);
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('path_view');
    Schema::dropIfExists('tipscoding_view');
  }
};
