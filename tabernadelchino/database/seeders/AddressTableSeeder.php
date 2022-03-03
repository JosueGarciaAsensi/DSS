<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;

class AddressTableSeeder extends Seeder
{
    protected $dirs = [];
    protected $type = ['Calle', 'Avenida'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(1,10) as $index) {
            DB::table('addresses')->insert(
                [
                    'type' => Str::random(10),
                    'name' => Str::random(10),
                    'pc' => Str::random(10) 
                ]
            );
        }
    }
}
