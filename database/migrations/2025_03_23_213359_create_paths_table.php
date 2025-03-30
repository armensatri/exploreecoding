<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('paths', function (Blueprint $table) {
      $table->id();
      $table->integer('sp');
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->string('url', 5)->unique();
      $table->unsignedInteger('views')->default(0);
      $table->foreignId('status_id')
        ->references('id')
        ->on('statuses')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->text('description')->default('-');
      $table->string('image')->nullable();
      $table->timestamps();

      $table->index('sp');
      $table->index('views');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('paths');
  }
};
