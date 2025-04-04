<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('menus', function (Blueprint $table) {
      $table->id();
      $table->integer('sm');
      $table->string('name')->unique();
      $table->string('url', 5)->unique();
      $table->text('description');
      $table->timestamps();

      $table->index('sm');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('menus');
  }
};
