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

        foreach (range(1,4) as $index) {                
                DB::table('carts')->insert(
                    [                        
                        'users_id' => $index,
                        'product_id' => $index                        
                    ]
                );
        }
    }
}
