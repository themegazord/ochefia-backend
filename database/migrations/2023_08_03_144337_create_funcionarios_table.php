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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id('funcionario_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('endereco_id')->nullable();
            $table->string('funcionario_nome', 155);
            $table->string('funcionario_email', 255);
            $table->string('cargo', 50);
            $table->binary('acessos');
            $table->timestamps();
        });

        Schema::table('funcionarios', function(Blueprint $table) {
            $table->foreign('empresa_id')->references('empresa_id')->on('empresas');
            $table->foreign('endereco_id')->references('endereco_id')->on('enderecos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropForeign('funcionarios_empresa_id_foreign');
            $table->dropForeign('funcionarios_endereco_id_foreign');
        });
        Schema::dropIfExists('funcionarios');
    }
};
