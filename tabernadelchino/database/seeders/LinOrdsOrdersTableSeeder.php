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

        foreach (range(0,4) as $index) {
            DB::table('linords')->insert(
                [
                    'user_id' => $index+1,
                    'order_id' => $index+1
                ]
            );
        }
    }
}
