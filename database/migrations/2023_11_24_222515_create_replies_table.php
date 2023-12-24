<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->id();

            // Relación con tabla respuesta.
            $table->unsignedBigInteger('reply_id')->nullable();
            $table->foreign('reply_id')
                ->references('id')
                ->on('replies')
                ->onDelete('set null');

            // Relación con tabla pregunta.
            $table->unsignedBigInteger('thread_id');
            $table->foreign('thread_id')
                ->references('id')
                ->on('threads')
                ->cascadeOnDelete();

            // Relación con tabla usuario.
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            // Elementos de la tabla respuestas.
            $table->text('body');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
