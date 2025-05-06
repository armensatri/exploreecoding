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
    });

    Schema::create('submenus', function (Blueprint $table) {
      $table->id();
      $table->foreignId('menu_id')
        ->references('id')
        ->on('menus')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->integer('ssm');
      $table->string('name')->unique();
      $table->string('url', 5)->unique();
      $table->string('route')->default('-');
      $table->string('active')->default('-');
      $table->string('routename')->default('-');
      $table->text('description');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('menus');
    Schema::dropIfExists('submenus');
  }
};
