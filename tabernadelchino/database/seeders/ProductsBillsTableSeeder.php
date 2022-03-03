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
        DB::table('product_bill')->delete();

        foreach (range(1,3) as $index) {
            DB::table('product_bill')->insert(
                [
                    'bill_id' => $index,
                    'product_id' => random_int(1, 7)
                ]
            );
        }
    }
}
