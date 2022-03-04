<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Heineken', 'Mahou', 'Estrella Galicia', 'Estrella Levante', 'Paulaner', 'San Miguel', 'CruzCampo', 'Steinburg'];
        $description = [
            'Es una cerveza de tipo Lager y estilo Pilsen de color amarillo claro y brillante, con una espuma blanca intensa, cremosa y persistente en el vaso.',
            'Soy la caña',
            'De las mejorcitas que probarás',
            'Si es de la huerta, es que está muy buena',
            'Esto está a otro nivel, sólo para los verdaderos amantes de la cerveza',
            'Estará a la misma altura que el arcangel Miguel?',
            'La favorita de Jordi',
            'No te dejes engañar porque se venda en el Mercadona'
        ];
        $price = [3.0, 1.5, 2, 1.8, 2.5, 1.5, 1.6, 0.79];

        DB::table('products')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(0, 4) as $index) {
            DB::table('products')->insert(
                [
                    'name' => $names[$index],
                    'stock' => random_int(1, 10),
                    'description' => $description[$index],
                    'price' => $price[$index],
                    'user_id' => $index+1, 
                    'beertype_id' => $index+1
                ]
            );
        } 
    }
}
