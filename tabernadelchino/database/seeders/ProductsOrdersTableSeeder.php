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
        DB::table('order_product')->delete();

        foreach (range(0, 4) as $index) {                
            DB::table('order_product')->insert(
                [    
                    'product_id' => $index+1,
                    'order_id' => $index+1
                ]
            );
        }
    }
}