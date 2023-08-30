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
            $table->unsignedBigInteger('prazopgto_id')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forma_pgto', function (Blueprint $table) {
            $table->unsignedBigInteger('prazopgto_id')->change();
        });
    }
};
