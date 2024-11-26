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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mascota'); // Relación con la tabla mascotas
            $table->unsignedBigInteger('servicio_id'); // Relación con la tabla servicios
            $table->date('fecha');
            $table->time('hora');
            $table->enum('estado', ['Pendiente', 'Realizado', 'Cancelado'])->default('Pendiente');
            $table->timestamps();
            $table->softDeletes(); // Añade la columna 'deleted_at'

            // Llaves foráneas
            $table->foreign('id_mascota')->references('id')->on('mascotas')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
