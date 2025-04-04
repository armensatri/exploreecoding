<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('permissions', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->string('url', 5)->unique();
      $table->string('guard_name')->default('web');
      $table->timestamps();

      $table->index('guard_name');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('permissions');
  }
};
