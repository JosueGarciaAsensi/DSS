<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dirs = ['Médico Pedro Herrero', 'La Flora', 'Denia', 'Aguilera', 'Isabel II'];
        $type = ['Calle', 'Avenida'];
        $pc = ['03006', '03007', '03006', '03010', '03008'];

        DB::table('addresses')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(1,4) as $index) {
            DB::table('addresses')->insert(
                [
                    'type' => $type[random_int(1, 1)],
                    'name' => $dirs[$index],
                    'pc' => $pc[$index] 
                ]
            );
        }
    }
}
