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

        foreach (range(0, 4) as $index) {                
            DB::table('product_order')->insert(
                [    
                    'product_id' => $index+1,
                    'order_id' => $index+1
                ]
            );
        }
    }
}