<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder {
    public static function obtenerSiguienteIndice($indiceDirecciones) {
        return DB::table('addresses')->where('id', '>', 0)->pluck('id')->toArray()[$indiceDirecciones - 1];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Francisco', 'Josué', 'Jordi', 'David', 'Ángel'];
        $surnames = ['Ferrández Martínez', 'García Asensi', 'Sellés Enríquez', 'Pastor Crespo', 'León Cerdán'];
        $emails = ['ffm18@alu.ua.es', 'jga74@alu.ua.es', 'jse10@alu.ua.es', 'dpc38@alu.ua.es', 'alc111@alu.ua.es'];
        $dni = ['55391233J', '51253198K', '23421897W', '384230271P', '891238421O'];

        DB::table('users')->delete();
        // Añadimos una entrada a esta tabla
        foreach (range(0, 4) as $index) {
            DB::table('users')->insert(
                [
                    'name' => $names[$index],
                    'surname' => $surnames[$index],
                    'email' => $emails[$index],
                    'password' => Hash::make(Str::random(5)),
                    'dni' => $dni[$index],
                    'admin' => true,
                    'address_id' => random_int(1, 3),
                    'cart_id' => $index+1
                ]
            );
            
        }
    }
}
