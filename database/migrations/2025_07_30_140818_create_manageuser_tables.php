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
        ->constrained('roles')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->boolean('status_on_of')->default(0);
      $table->timestamp('last_seen')->nullable();
      $table->boolean('status')->default(true)->after('email');
      $table->string('url', 7)->unique();
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
      $table->string('guard_name')->default('web');
      $table->string('url', 7)->unique();
      $table->timestamps();
    });

    Schema::create('permissions', function (Blueprint $table) {
      $table->id();
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->string('guard_name')->default('web');
      $table->string('url', 7)->unique();
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
