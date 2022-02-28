<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BeerTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beertype')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(1,10) as $index) {
            DB::table('beertype')->insert(
                [
                    'name' => Str::random(10)
                ]
            );
        }
    }
}
