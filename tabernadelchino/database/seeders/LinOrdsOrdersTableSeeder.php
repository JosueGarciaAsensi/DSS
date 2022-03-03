<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinOrdsOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('linords')->delete();

        foreach (range(1,4) as $index) {
            DB::table('linords')->insert(
                [
                    'user_id' => random_int(1, 5),
                    'order_id' => $index
                ]
            );
        }
    }
}
