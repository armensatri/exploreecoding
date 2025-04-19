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
      $table->boolean('status')->default(0);
      $table->timestamps();
    });

    Schema::create('roles', function (Blueprint $table) {
      $table->id();
      $table->integer('sr');
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->string('bg');
      $table->string('text');
      $table->text('description');
      $table->timestamps();
    });

    Schema::create('permissions', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->string('url', 5)->unique();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('roles');
    Schema::dropIfExists('users');
    Schema::dropIfExists('permissions');
  }
};
