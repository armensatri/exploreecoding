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
      $table->integer('sr')->index();
      $table->string('name');
      $table->string('slug')->unique();
      $table->string('bg');
      $table->string('text');
      $table->text('description');
      $table->string('guard_name')->default('web');
      $table->timestamps();

      $table->unique(['name', 'guard_name']);
    });

    Schema::create('permissions', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('slug')->unique();
      $table->string('guard_name')->default('web');
      $table->timestamps();

      $table->unique(['name', 'guard_name']);
    });

    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('username')->unique();
      $table->string('email')->unique();
      $table->string('gender')->nullable()->after('name');
      $table->boolean('status')->default(true);
      $table->string('password');
      $table->string('image')->nullable();
      $table->foreignId('role_id')
        ->constrained('roles')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->boolean('status_on_of')->default(false);
      $table->timestamp('last_seen')->nullable();
      $table->unsignedBigInteger('province_code')->nullable();
      $table->unsignedBigInteger('city_code')->nullable();
      $table->unsignedBigInteger('district_code')->nullable();
      $table->text('bio')->nullable();
      $table->timestamps();

      $table->index(['status_on_of', 'last_seen']);
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('users');
    Schema::dropIfExists('permissions');
    Schema::dropIfExists('roles');
  }
};
