<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('categorias')) {
            Schema::create('categorias', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->text('descricao')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('prioridades')) {
            Schema::create('prioridades', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('statuses')) {
            Schema::create('statuses', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('tarefas')) {
            Schema::create('tarefas', function (Blueprint $table) {
                $table->id();
                $table->string('titulo');
                $table->text('descricao')->nullable();
                $table->date('data_limite')->nullable();
                $table->foreignId('id_categoria')->constrained('categorias')->cascadeOnUpdate()->restrictOnDelete();
                $table->foreignId('id_prioridade')->constrained('prioridades')->cascadeOnUpdate()->restrictOnDelete();
                $table->foreignId('id_status')->constrained('statuses')->cascadeOnUpdate()->restrictOnDelete();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('prioridades');
        Schema::dropIfExists('categorias');
    }
};
