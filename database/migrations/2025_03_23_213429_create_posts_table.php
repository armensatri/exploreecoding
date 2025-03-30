<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreignId('playlist_id')
        ->references('id')
        ->on('playlists')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->integer('sp');
      $table->string('title');
      $table->string('slug')->unique();
      $table->text('excerpt');
      $table->text('content');
      $table->unsignedInteger('views')->default(0);
      $table->foreignId('status_id')
        ->references('id')
        ->on('statuses')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->string('image')->nullable();
      $table->timestamps();

      $table->index('sp');
      $table->index('title');
      $table->index('views');
      $table->index(['user_id', 'playlist_id', 'status_id']);
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('posts');
  }
};
