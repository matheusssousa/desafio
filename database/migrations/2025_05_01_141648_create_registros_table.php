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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();

            $table->string('nome', 150);
            $table->integer('idade');
            $table->string('cpf', 11)->unique();
            $table->string('cidade', 100);
            $table->string('estado', 2);
            $table->string('rua', 150);
            $table->string('bairro', 100);
            $table->boolean('ensino_medio');
            $table->string('sexo', 20);
            $table->decimal('salario', 12, 2);
            $table->string('anexo');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
