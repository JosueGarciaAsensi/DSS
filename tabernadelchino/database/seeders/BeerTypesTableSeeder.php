<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BeerTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Clásica', 'Especial', 'Tostada', 'Negra', 'Trigo'];

        DB::table('beer_types')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(0,4) as $index) {
            DB::table('beer_types')->insert(
                [
                    'name' => $types[$index]
                ]
            );
        }
    }
}
