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
        DB::table('cart')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(1,10) as $index) {
            foreach (range(1,10) as $indey) {
                DB::table('cart')->insert(
                    [
                        'product_id' => $indey
                    ]
                );
            }
        }
    }
}
