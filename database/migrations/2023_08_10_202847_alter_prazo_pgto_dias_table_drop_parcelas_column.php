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
        Schema::table('prazo_pgto_dias', function (Blueprint $table) {
            $table->dropColumn('parcela');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prazo_pgto_dias', function (Blueprint $table) {
            $table->smallInteger('parcela');
        });
    }
};
