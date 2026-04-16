<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('tipscodings', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')
        ->constrained('users')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->foreignId('category_id')
        ->constrained('categories')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->string('title');
      $table->string('slug');
      $table->text('excerpt');
      $table->text('content');
      $table->string('image')->nullable();
      $table->string('url', 7)->unique();
      $table->timestamps();
    });

    Schema::create('categories', function (Blueprint $table) {
      $table->id();
      $table->integer('sc')->index();
      $table->string('name');
      $table->string('slug');
      $table->string('image')->nullable();
      $table->string('url', 7)->unique();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('tipscodings');
    Schema::dropIfExists('categories');
  }
};
