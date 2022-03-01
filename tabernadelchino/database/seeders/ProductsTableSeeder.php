<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(1,10) as $index) {
            DB::table('products')->insert(
                [
                    'name' => Str::random(10),
                    'stock' => 1,
                    'description' => Str::random(10),
                    'price' => 10.0,
                    'beertype_id' => $index  #TODO Mirar si funciona
                ]
            );
        } 
    }
}
