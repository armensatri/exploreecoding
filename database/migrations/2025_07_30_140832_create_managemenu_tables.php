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
      $table->integer('sm')->index();
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->text('description');
      $table->string('url', 7)->unique();
      $table->timestamps();
    });

    Schema::create('submenus', function (Blueprint $table) {
      $table->id();
      $table->foreignId('menu_id')
        ->constrained('menus')
        ->cascadeOnDelete()
        ->cascadeOnUpdate()
        ->index();
      $table->integer('ssm');
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->string('route');
      $table->string('active')->index();
      $table->string('routename')->index();
      $table->text('description');
      $table->string('url', 7)->unique();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('menus');
    Schema::dropIfExists('submenus');
  }
};
