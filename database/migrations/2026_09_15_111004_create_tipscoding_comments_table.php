<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('tipscoding_comments', function (Blueprint $table) {
      $table->id();
      $table->foreignId('tipscoding_id')
        ->constrained('tipscodings')
        ->cascadeOnDelete();
      $table->foreignId('user_id')
        ->constrained('users')
        ->cascadeOnDelete();
      $table->text('comment');
      $table->string('status')->default('approved');
      $table->timestamps();

      $table->index([
        'tipscoding_id',
        'status',
      ]);
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('tipscoding_comments');
  }
};
