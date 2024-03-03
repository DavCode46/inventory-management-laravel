<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        DB::table('items')->insert([
            ['name' => 'Luces de Navidad', 'description' => 'Luces de Navidad LED de colores.', 'price' => 15.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Adornos de Navidad', 'description' => 'Set de adornos para árbol de Navidad.', 'price' => 10.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Corona de Navidad', 'description' => 'Corona de Navidad para la puerta.', 'price' => 20.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Calcetines de Navidad', 'description' => 'Calcetines de Navidad para regalos.', 'price' => 5.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Velas de Navidad', 'description' => 'Velas aromáticas de Navidad.', 'price' => 10.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Espumillón', 'description' => 'Espumillón de colores para decoración.', 'price' => 5.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Bolas de Navidad', 'description' => 'Bolas de Navidad para decoración del árbol.', 'price' => 10.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Estrella de Navidad', 'description' => 'Estrella de Navidad para el árbol.', 'price' => 5.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Belén', 'description' => 'Belén con figuras de cerámica.', 'price' => 30.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],

            ['name' => 'Ratón', 'description' => 'Ratón inalámbrico con sensor óptico.', 'price' => 25.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Teclado', 'description' => 'Teclado mecánico retroiluminado.', 'price' => 70.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Disco duro', 'description' => 'Disco duro externo de 1TB.', 'price' => 50.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Monitor', 'description' => 'Monitor LED de 24 pulgadas.', 'price' => 100.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Cables USB', 'description' => 'Pack de cables USB de diferentes tipos.', 'price' => 10.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Cargador de móvil', 'description' => 'Cargador de móvil con USB-C.', 'price' => 15.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Auriculares', 'description' => 'Auriculares inalámbricos con cancelación de ruido.', 'price' => 50.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Altavoces', 'description' => 'Altavoces 2.1 con subwoofer.', 'price' => 50.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Adornos de Navidad', 'description' => 'Set de adornos para árbol de Navidad.', 'price' => 10.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated-at' => $currentTimestamp],

            ['name' => 'Juego de destornilladores', 'description' => '20 piezas, incluye estrella y planos.', 'price' => 25.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Martillo de carpintero', 'description' => 'Acero forjado, mango ergonómico.', 'price' => 20.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Llave ajustable', 'description' => 'Acero inoxidable, 30 cm de longitud.', 'price' => 15.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Taladro inalámbrico', 'description' => '18V, incluye batería y cargador.', 'price' => 90.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Sierra circular', 'description' => 'Disco de 7.25 pulgadas, guía láser.', 'price' => 60.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Juego de brocas', 'description' => 'Para metal, madera y concreto, 50 piezas.', 'price' => 30.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Nivel láser', 'description' => 'Autonivelante, incluye trípode.', 'price' => 85.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Caja de herramientas', 'description' => 'Metálica, 5 compartimentos.', 'price' => 40.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Juego de llaves hexagonales', 'description' => 'Acero aleado, 25 piezas.', 'price' => 22.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Cinta métrica', 'description' => '25 metros, carcasa resistente.', 'price' => 12.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Corona de Navidad', 'description' => 'Corona de Navidad para la puerta.', 'price' => 20.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Calcetines de Navidad', 'description' => 'Calcetines de Navidad para regalos.', 'price' => 5.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Velas de Navidad', 'description' => 'Velas aromáticas de Navidad.', 'price' => 10.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Espumillón', 'description' => 'Espumillón de colores para decoración.', 'price' => 5.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Bolas de Navidad', 'description' => 'Bolas de Navidad para decoración del árbol.', 'price' => 10.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Estrella de Navidad', 'description' => 'Estrella de Navidad para el árbol.', 'price' => 5.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Belén', 'description' => 'Belén con figuras de cerámica.', 'price' => 30.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],

            ['name' => 'Ratón', 'description' => 'Ratón inalámbrico con sensor óptico.', 'price' => 25.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Teclado', 'description' => 'Teclado mecánico retroiluminado.', 'price' => 70.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Disco duro', 'description' => 'Disco duro externo de 1TB.', 'price' => 50.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Monitor', 'description' => 'Monitor LED de 24 pulgadas.', 'price' => 100.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Cables USB', 'description' => 'Pack de cables USB de diferentes tipos.', 'price' => 10.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Cargador de móvil', 'description' => 'Cargador de móvil con USB-C.', 'price' => 15.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Auriculares', 'description' => 'Auriculares inalámbricos con cancelación de ruido.', 'price' => 50.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Altavoces', 'description' => 'Altavoces 2.1 con subwoofer.', 'price' => 50.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
            ['name' => 'Router', 'description' => 'Router wifi con 4 antenas.', 'price' => 60.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
    
                ['name' => 'Juego de destornilladores', 'description' => '20 piezas, incluye estrella y planos.', 'price' => 25.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Martillo de carpintero', 'description' => 'Acero forjado, mango ergonómico.', 'price' => 20.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Llave ajustable', 'description' => 'Acero inoxidable, 30 cm de longitud.', 'price' => 15.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Taladro inalámbrico', 'description' => '18V, incluye batería y cargador.', 'price' => 90.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Sierra circular', 'description' => 'Disco de 7.25 pulgadas, guía láser.', 'price' => 60.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Juego de brocas', 'description' => 'Para metal, madera y concreto, 50 piezas.', 'price' => 30.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Nivel láser', 'description' => 'Autonivelante, incluye trípode.', 'price' => 85.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Caja de herramientas', 'description' => 'Metálica, 5 compartimentos.', 'price' => 40.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Juego de llaves hexagonales', 'description' => 'Acero aleado, 25 piezas.', 'price' => 22.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Cinta métrica', 'description' => '25 metros, carcasa resistente.', 'price' => 12.00, 'box_id' => 4, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Corona de Navidad', 'description' => 'Corona de Navidad para la puerta.', 'price' => 20.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Calcetines de Navidad', 'description' => 'Calcetines de Navidad para regalos.', 'price' => 5.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Velas de Navidad', 'description' => 'Velas aromáticas de Navidad.', 'price' => 10.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Espumillón', 'description' => 'Espumillón de colores para decoración.', 'price' => 5.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Bolas de Navidad', 'description' => 'Bolas de Navidad para decoración del árbol.', 'price' => 10.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Estrella de Navidad', 'description' => 'Estrella de Navidad para el árbol.', 'price' => 5.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Belén', 'description' => 'Belén con figuras de cerámica.', 'price' => 30.00, 'box_id' => 1, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
    
                ['name' => 'Ratón', 'description' => 'Ratón inalámbrico con sensor óptico.', 'price' => 25.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Teclado', 'description' => 'Teclado mecánico retroiluminado.', 'price' => 70.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Disco duro', 'description' => 'Disco duro externo de 1TB.', 'price' => 50.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Monitor', 'description' => 'Monitor LED de 24 pulgadas.', 'price' => 100.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Cables USB', 'description' => 'Pack de cables USB de diferentes tipos.', 'price' => 10.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
                ['name' => 'Cargador de móvil', 'description' => 'Cargador de móvil con USB-C.', 'price' => 15.00, 'box_id' => 2, 'created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp],
        ]);
    }
}