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
        Schema::table('prazo_pgto', function (Blueprint $table) {
            $table->string('prazopgto_tipo', 30)->change();
            $table->string('prazopgto_tipoforma', 155)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prazo_pgto', function (Blueprint $table) {
            $table->char('prazopgto_tipo', 1)->change();
            $table->string('prazopgto_tipoforma', 50)->nullable()->change();
        });
    }
};
