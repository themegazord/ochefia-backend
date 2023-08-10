<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prazo_pgto_dias', function (Blueprint $table) {
            $table->id('prazopgto_dias_id');
            $table->unsignedBigInteger('prazopgto_id');
            $table->smallInteger('parcela');
            $table->smallInteger('dias');
            $table->timestamps();

            $table->foreign('prazopgto_id')
                ->references('prazopgto_id')
                ->on('prazo_pgto');
        });
    }

    public function down(): void
    {
        Schema::table('prazo_pgto_dias', function (Blueprint $table) {
            $table->dropForeign('prazo_pgto_dias_prazopgto_id_foreign');
        });
        Schema::dropIfExists('prazo_pgto_dias');
    }
};
