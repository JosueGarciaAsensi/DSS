<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(1,10) as $index) {
            DB::table('order')->insert(
                [
                    'state' => Str::random(10),
                    'cart_id' => $index
                ]
            );
        }
    }
}
