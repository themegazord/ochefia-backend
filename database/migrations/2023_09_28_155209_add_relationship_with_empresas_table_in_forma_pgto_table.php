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
        Schema::table('forma_pgto', function (Blueprint $table) {
            $table->unsignedBigInteger('empresa_id')->after('formapgto_id');
            $table->foreign('empresa_id')->references('empresa_id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forma_pgto', function (Blueprint $table) {
            $table->dropForeign('forma_pgto_empresa_id_foreign');
            $table->dropColumn('empresa_id');
        });
    }
};
