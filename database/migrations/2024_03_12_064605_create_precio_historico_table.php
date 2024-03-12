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
        Schema::create('precio_historico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cuadro_id');
            $table->foreign('cuadro_id')->references('id')->on('cuadros');
            $table->decimal('precio_euros', 10, 2);
            $table->decimal('precio_dolares', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precio_historico');
    }
};
