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
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',100)->unique()->nullable(false);
            $table->string('diretor',100)->nullable(false);
            $table->string('genero',100)->nullable(false);
            $table->date('dt_lancamento')->nullable(false);
            $table->text('sinopse',10000)->nullable(false);
            $table->string('elenco',100)->nullable(false);
            $table->string('classificacao',100)->nullable(false);
            $table->string('plataformas',100)->nullable(false);
            $table->time('duracao')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmes');
    }
};
