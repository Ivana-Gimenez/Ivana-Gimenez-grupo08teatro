<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Renombrar la tabla entradas a detalle_compras
        Schema::rename('entradas', 'detalle_compras');
    }

    public function down(): void
    {
        // Revertir: renombrar detalle_compras a entradas
        Schema::rename('detalle_compras', 'entradas');
    }
};
