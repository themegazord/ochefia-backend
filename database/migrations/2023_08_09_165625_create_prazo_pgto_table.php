<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prazo_pgto', function (Blueprint $table) {
            $table->id('prazopgto_id');
            $table->string('prazopgto_nome', 50);
            $table->char('prazopgto_tipo', 1);
            $table->char('prazopgto_tipoforma', 3)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prazo_pgto');
    }
};
