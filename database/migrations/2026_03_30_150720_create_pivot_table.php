<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('role_has_menu', function (Blueprint $table) {
      $table->id();
      $table->foreignId('role_id')
        ->constrained('roles')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->foreignId('menu_id')
        ->constrained('menus')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->index(['role_id', 'menu_id']);
    });

    Schema::create('role_has_submenu', function (Blueprint $table) {
      $table->id();
      $table->foreignId('role_id')
        ->constrained('roles')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->foreignId('submenu_id')
        ->constrained('submenus')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->index(['role_id', 'submenu_id']);
    });

    Schema::create('role_has_permission', function (Blueprint $table) {
      $table->id();
      $table->foreignId('role_id')
        ->constrained('roles')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->foreignId('permission_id')
        ->constrained('permissions')
        ->cascadeOnDelete()
        ->cascadeOnUpdate();
      $table->index(['role_id', 'permission_id']);
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('role_has_menu');
    Schema::dropIfExists('role_has_submenu');
    Schema::dropIfExists('role_has_permission');
  }
};
