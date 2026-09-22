<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('tipscoding_comment_reports', function (Blueprint $table) {
      $table->id();

      $table->foreignId('tipscoding_comment_id')
        ->constrained('tipscoding_comments')
        ->cascadeOnDelete();

      $table->foreignId('user_id')
        ->constrained('users')
        ->cascadeOnDelete();

      $table->string('reason', 50);

      $table->text('description')->nullable();

      $table->enum('status', [
        'pending',
        'resolved',
        'rejected',
      ])->default('pending');

      $table->foreignId('reviewed_by')
        ->nullable()
        ->constrained('users')
        ->nullOnDelete();

      $table->timestamp('reviewed_at')->nullable();

      $table->timestamps();

      $table->unique([
        'tipscoding_comment_id',
        'user_id',
      ]);

      $table->index('status');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('tipscoding_comment_reports');
  }
};
