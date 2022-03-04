<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsCartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_cart')->delete();

        foreach (range(1, 4) as $index) {
            DB::table('product_cart')->insert(
                [
                    'product_id' => random_int(1, 7),
                    'cart_id' => $index
                ]
            );
        }
    }
}