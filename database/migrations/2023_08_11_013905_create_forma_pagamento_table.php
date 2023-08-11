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
        Schema::create('forma_pgto', function (Blueprint $table) {
            $table->id('formapgto_id');
            $table->string('formapgto_nome', 50);
            $table->string('formapgto_tipo', 30);
            $table->unsignedBigInteger('clientes_id')->nullable()->default(null);
            $table->unsignedBigInteger('prazopgto_id');
            $table->timestamps();

            $table->foreign('clientes_id')->references('clientes_id')->on('clientes');
            $table->foreign('prazopgto_id')->references('prazopgto_id')->on('prazo_pgto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forma_pgto', function (Blueprint $table) {
            $table->dropForeign('forma_pgto_clientes_id_foreign');
            $table->dropForeign('forma_pgto_prazopgto_id_foreign');
        });
        Schema::dropIfExists('forma_pgto');
    }
};
