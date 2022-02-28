<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            $timestamp = mt_rand(1, time());
            DB::table('bills')->insert(
                [
                    'date' => date("d M Y", $timestamp),
                    'amount' => 20.0,
                    'order_id' => $index
                ]
            );
        }
    }
}
