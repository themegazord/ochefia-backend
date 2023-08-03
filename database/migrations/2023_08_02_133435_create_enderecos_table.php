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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id('endereco_id');
            $table->string('endereco_rua', 255);
            $table->integer('endereco_numero');
            $table->string('endereco_complemento', 155)->nullable();
            $table->string('endereco_cep', 8);
            $table->string('endereco_bairro', 50);
            $table->string('endereco_cidadae', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
