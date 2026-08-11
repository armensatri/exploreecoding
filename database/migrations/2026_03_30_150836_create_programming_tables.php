<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('paths', function (Blueprint $table) {
      $table->id();
      $table->foreignId('status_id')
        ->constrained('statuses')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->integer('sp');
      $table->string('name');
      $table->string('slug');
      $table->text('description');
      $table->string('image')->nullable();
      $table->timestamps();

      $table->index(['status_id', 'sp']);
    });

    Schema::create('roadmaps', function (Blueprint $table) {
      $table->id();
      $table->foreignId('status_id')
        ->constrained('statuses')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->foreignId('path_id')
        ->constrained('paths')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->integer('sr');
      $table->string('name');
      $table->string('slug');
      $table->text('description');
      $table->string('image')->nullable();
      $table->timestamps();

      $table->index(['path_id', 'status_id', 'sr']);
    });

    Schema::create('playlists', function (Blueprint $table) {
      $table->id();
      $table->foreignId('status_id')
        ->constrained('statuses')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->foreignId('roadmap_id')
        ->constrained('roadmaps')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->integer('spl');
      $table->string('name');
      $table->string('slug');
      $table->text('description');
      $table->string('image')->nullable();
      $table->timestamps();

      $table->index(['roadmap_id', 'status_id', 'spl']);
    });

    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')
        ->constrained('users')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->foreignId('status_id')
        ->constrained('statuses')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->foreignId('playlist_id')
        ->constrained('playlists')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->integer('sp');
      $table->string('title');
      $table->string('slug');
      $table->text('excerpt');
      $table->text('content');
      $table->string('image')->nullable();
      $table->timestamps();

      $table->index(['playlist_id', 'status_id', 'sp']);
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('posts');
    Schema::dropIfExists('playlists');
    Schema::dropIfExists('roadmaps');
    Schema::dropIfExists('paths');
  }
};
