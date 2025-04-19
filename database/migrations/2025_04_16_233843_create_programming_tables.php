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
      $table->integer('sp');
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->string('url', 5)->unique();
      $table->unsignedInteger('views')->default(0);
      $table->foreignId('status_id')
        ->references('id')
        ->on('statuses')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->text('description')->default('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit reprehenderit neque dolorum fugiat deleniti nulla nihil possimus aliquid, nesciunt commodi');
      $table->string('image')->nullable();
      $table->timestamps();
    });

    Schema::create('roadmaps', function (Blueprint $table) {
      $table->id();
      $table->foreignId('path_id')
        ->references('id')
        ->on('paths')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->integer('sr');
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->string('url', 5)->unique();
      $table->unsignedInteger('views')->default(0);
      $table->foreignId('status_id')
        ->references('id')
        ->on('statuses')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->text('description')->default('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit reprehenderit neque dolorum fugiat deleniti nulla nihil possimus aliquid, nesciunt commodi');
      $table->string('image')->nullable();
      $table->timestamps();
    });

    Schema::create('playlists', function (Blueprint $table) {
      $table->id();
      $table->foreignId('roadmap_id')
        ->references('id')
        ->on('roadmaps')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->integer('spl');
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->string('url', 5)->unique();
      $table->unsignedInteger('views')->default(0);
      $table->foreignId('status_id')
        ->references('id')
        ->on('statuses')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->text('description')->default('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit reprehenderit neque dolorum fugiat deleniti nulla nihil possimus aliquid, nesciunt commodi');
      $table->string('image')->nullable();
      $table->timestamps();
    });

    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('playlist_id')
        ->references('id')
        ->on('playlists')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->integer('sp');
      $table->string('title');
      $table->string('slug')->unique();
      $table->string('url', 5)->unique();
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
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('paths');
    Schema::dropIfExists('roadmaps');
    Schema::dropIfExists('playlists');
    Schema::dropIfExists('posts');
  }
};
