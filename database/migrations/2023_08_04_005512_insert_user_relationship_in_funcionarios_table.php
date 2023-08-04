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
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id')->after('funcionario_id');
            $table->foreign('usuario_id')->references('usuario_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropForeign('funcionarios_usuario_id_foreign');
            $table->dropColumn('usuario_id');
        });
    }
};
