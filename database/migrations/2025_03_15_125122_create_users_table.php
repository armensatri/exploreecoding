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
      $table->string('name');
      $table->string('username')->unique();
      $table->string('email')->unique();
      $table->string('password');
      $table->string('image')->nullable();
      $table->foreignId('role_id')
        ->references('id')
        ->on('roles')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->boolean('is_active')->default(1);
      $table->timestamps();

      $table->index('name');
      $table->index('role_id');
      $table->index('is_active');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
