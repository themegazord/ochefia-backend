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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id('produto_id');
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('grupo_produto_id');
            $table->unsignedBigInteger('sub_grupo_produto_id');
            $table->unsignedBigInteger('fabricante_produto_id');
            $table->unsignedBigInteger('classe_produto_id');
            $table->unsignedBigInteger('unidade_id');
            $table->string('produto_nome', 155);
            $table->decimal('produto_estoque', 15, 2)->default(0);
            $table->decimal('produto_preco', 15, 2)->default(0);
            $table->timestamps();
        });

        Schema::table('produtos', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('empresa_id')->on('empresas');
            $table->foreign('grupo_produto_id')->references('grupo_produto_id')->on('grupo_produtos');
            $table->foreign('sub_grupo_produto_id')->references('sub_grupo_produto_id')->on('sub_grupo_produtos');
            $table->foreign('fabricante_produto_id')->references('fabricante_produto_id')->on('fabricante_produto');
            $table->foreign('classe_produto_id')->references('classe_produto_id')->on('classe_produto');
            $table->foreign('unidade_id')->references('unidade_id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_empresa_id_foreign');
            $table->dropForeign('produtos_grupo_produto_id_foreign');
            $table->dropForeign('produtos_sub_grupo_produto_id_foreign');
            $table->dropForeign('produtos_fabricante_produto_id_foreign');
            $table->dropForeign('produtos_classe_produto_id_foreign');
            $table->dropForeign('produtos_unidade_id_foreign');
        });
        Schema::dropIfExists('produtos');
    }
};
