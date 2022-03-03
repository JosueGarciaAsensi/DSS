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
        $types = ['Clásica', 'Especial', 'Tostada', 'Negra'];

        DB::table('beertypes')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(0,3) as $index) {
            DB::table('beertypes')->insert(
                [
                    'name' => $types[$index]
                ]
            );
        }
    }
}
