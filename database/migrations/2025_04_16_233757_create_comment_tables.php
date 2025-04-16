<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('comments', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });

    Schema::create('emoticons', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });

    Schema::create('likes', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });

    Schema::create('medias', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });

    Schema::create('mentions', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });

    Schema::create('notifications', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('comments');
    Schema::dropIfExists('emoticons');
    Schema::dropIfExists('likes');
    Schema::dropIfExists('medias');
    Schema::dropIfExists('mentions');
    Schema::dropIfExists('notifications');
  }
};
