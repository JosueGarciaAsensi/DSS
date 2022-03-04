<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsBillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill_product')->delete();

        foreach (range(0, 4) as $index) {
            DB::table('bill_product')->insert(
                [
                    'bill_id' => $index+1,
                    'product_id' => $index+1
                ]
            );
        }
    }
}
