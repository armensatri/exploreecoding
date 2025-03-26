<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('roles', function (Blueprint $table) {
      $table->id();
      $table->integer('sr');
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->string('bg');
      $table->string('text');
      $table->text('description');
      $table->string('guard_name')->default('web');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('roles');
  }
};
