<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gasto;
use App\Models\User;
use App\Models\Categoria;

class GastoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtén el primer usuario de la base de datos
        $usuario = User::first(); 

        // Asegurémonos de que exista la categoría 'Comida' y 'Transporte'
        $categoria_comida = Categoria::firstOrCreate(['nombre' => 'Comida', 'tipo' => 0]);
        $categoria_transporte = Categoria::firstOrCreate(['nombre' => 'Transporte', 'tipo' => 0]);

        // Crear algunos gastos de ejemplo
        Gasto::create([
            'user_id' => $usuario->id,  // Relación con el usuario
            'categoria_id' => $categoria_comida->id,  // Relación con la categoría 'Comida'
            'descripcion' => 'Compra en supermercado',
            'monto' => 50.75,
            'fecha' => now()->toDateString(),
        ]);

        Gasto::create([
            'user_id' => $usuario->id,
            'categoria_id' => $categoria_comida->id,
            'descripcion' => 'Almuerzo en restaurante',
            'monto' => 30.50,
            'fecha' => now()->toDateString(),
        ]);

        Gasto::create([
            'user_id' => $usuario->id,
            'categoria_id' => $categoria_transporte->id,
            'descripcion' => 'Transporte en taxi',
            'monto' => 15.00,
            'fecha' => now()->toDateString(),
        ]);

        Gasto::create([
            'user_id' => $usuario->id,
            'categoria_id' => $categoria_transporte->id,
            'descripcion' => 'Gasolina',
            'monto' => 45.00,
            'fecha' => now()->toDateString(),
        ]);
    }
}
