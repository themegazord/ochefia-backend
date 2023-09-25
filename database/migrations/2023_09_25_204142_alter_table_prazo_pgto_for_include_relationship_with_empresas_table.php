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
        Schema::table('prazo_pgto', function(Blueprint $table) {
            $table->unsignedBigInteger('empresa_id')->after('prazopgto_id')->default(null);
            $table->foreign('empresa_id')->references('empresa_id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prazo_pgto', function(Blueprint $table) {
            $table->dropForeign('prazo_pgto_empresa_id_foreign');
            $table->dropColumn('empresa_id');
        });
    }
};
