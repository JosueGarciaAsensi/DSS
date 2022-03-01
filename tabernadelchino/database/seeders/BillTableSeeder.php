<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(1,10) as $index) {
            $t = date("d m Y", mt_rand(1, time()));
            DB::table('bills')->insert(
                [
                    'date' => Carbon::create($t[2], $t[1], $t[0]),
                    'amount' => 20.0,
                    'order_id' => $index
                ]
            );
        }
    }
}
