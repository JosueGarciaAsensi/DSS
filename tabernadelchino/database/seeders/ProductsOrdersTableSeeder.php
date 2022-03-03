<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_order')->delete();

        foreach (range(1,3) as $index) {                
            DB::table('product_order')->insert(
                [    
                    'product_id' => random_int(1, 7),
                    'order_id' => $index
                ]
            );
        }
    }
}