<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });

    Schema::create('roles', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });

    Schema::create('permissions', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('users');
    Schema::dropIfExists('roles');
    Schema::dropIfExists('permissions');
  }
};
