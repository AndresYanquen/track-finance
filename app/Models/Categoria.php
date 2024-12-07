<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria'; // Nombre de la tabla

    /**
     * Los atributos que se pueden asignar de forma masiva.
     */
    protected $fillable = [
        'nombre',
        'tipo',
        'descripcion',
        'estado',
    ];

    /**
     * Casts para convertir automáticamente los datos.
     */
    protected $casts = [
        'estado' => 'boolean',
        'tipo' => 'integer',
    ];
}
