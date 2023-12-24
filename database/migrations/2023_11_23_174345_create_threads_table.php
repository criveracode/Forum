<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->id();

            // Relación con tabla categoria.
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();

            // Relación con tabla usuario.
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            // Elementos de la tabla pregunta.
            $table->string('title');
            $table->text('body');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('threads');
    }
};
