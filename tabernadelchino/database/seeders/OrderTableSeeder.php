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
        DB::table('orders')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(1,10) as $index) {
            DB::table('orders')->insert(
                [
                    'state' => Str::random(10),
                    'users_id' => $index
                ]
            );
        }
    }
}
