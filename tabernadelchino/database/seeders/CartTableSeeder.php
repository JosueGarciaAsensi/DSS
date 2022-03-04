<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->delete();
        // Añadimos una entrada a esta tabla

        foreach (range(0, 4) as $index) {                
                DB::table('carts')->insert(
                    [                        
                        'status' => $index % 2 // Esto establece los carritos como 0 y 1 (modulo)
                    ]
                );
        }
    }
}
