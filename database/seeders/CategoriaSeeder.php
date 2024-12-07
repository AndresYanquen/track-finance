<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            // Categorías de ingresos
            ['nombre' => 'Salario', 'tipo' => 1, 'descripcion' => 'Ingreso mensual por trabajo', 'estado' => true],
            ['nombre' => 'Inversiones', 'tipo' => 1, 'descripcion' => 'Rendimientos de inversiones financieras', 'estado' => true],
            ['nombre' => 'Ventas', 'tipo' => 1, 'descripcion' => 'Ingresos por venta de productos o servicios', 'estado' => true],

            // Categorías de gastos
            ['nombre' => 'Alquiler', 'tipo' => 0, 'descripcion' => 'Pago mensual por vivienda', 'estado' => true],
            ['nombre' => 'Transporte', 'tipo' => 0, 'descripcion' => 'Gastos en transporte público o gasolina', 'estado' => true],
            ['nombre' => 'Comida', 'tipo' => 0, 'descripcion' => 'Gastos en alimentos y restaurantes', 'estado' => true],
            ['nombre' => 'Entretenimiento', 'tipo' => 0, 'descripcion' => 'Gastos en actividades recreativas', 'estado' => true],
            ['nombre' => 'Educación', 'tipo' => 0, 'descripcion' => 'Pagos relacionados con educación y formación', 'estado' => true],
            ['nombre' => 'Salud', 'tipo' => 0, 'descripcion' => 'Gastos médicos y de bienestar', 'estado' => true],
            ['nombre' => 'Otros', 'tipo' => 0, 'descripcion' => 'Otros gastos', 'estado' => true],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
