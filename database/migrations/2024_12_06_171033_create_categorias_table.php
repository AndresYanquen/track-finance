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
        Schema::create('categoria', function (Blueprint $table) {
            $table->id(); // id INT AUTO_INCREMENT PRIMARY KEY
            $table->string('nombre', 100); // nombre VARCHAR(100) NOT NULL
            $table->tinyInteger('tipo'); // tipo TINYINT(1) NOT NULL
            $table->text('descripcion')->nullable(); // descripcion TEXT
            $table->boolean('estado')->default(true); // estado BOOLEAN DEFAULT TRUE
            $table->timestamps(); // fecha_creacion y fecha_actualizacion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
