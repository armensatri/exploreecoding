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
      $table->timestamps();
    });

    Schema::create('roadmaps', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });

    Schema::create('playlists', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });

    Schema::create('posts', function (Blueprint $table) {
      $table->id();
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
