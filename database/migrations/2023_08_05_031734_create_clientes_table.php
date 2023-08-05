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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('clientes_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('endereco_id');
            $table->string('cliente_nome', 255);
            $table->string('cliente_email', 255);
            $table->string('cliente_senha', 255);
            $table->string('cliente_cpf', 11);
            $table->string('cliente_telefone', 20);
            $table->string('cliente_telefone_contato', 20);
            $table->timestamps();
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('endereco_id')->references('endereco_id')->on('enderecos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign('clientes_usuario_id_foreign');
            $table->dropForeign('clientes_endereco_id_foreign');
        });
        Schema::dropIfExists('clientes');
    }
};
