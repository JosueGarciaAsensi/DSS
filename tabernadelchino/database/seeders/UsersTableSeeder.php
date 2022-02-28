<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public static function obtenerSiguienteIndice($indiceDirecciones) {
        while (! DB::table('addresses')->key_exists($indiceDirecciones)) {
            $indiceDirecciones += 1;
        }
        return $indiceDirecciones;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        // Añadimos una entrada a esta tabla
        $indiceDirecciones = 1;
        foreach (range(1,10) as $index) {
            $indiceDirecciones = $this->obtenerSiguienteIndice($indiceDirecciones);
            DB::table('users')->insert(
                [
                    'name' => Str::random(10),
                    'surname' => Str::random(10),
                    'email' => Str::random(5)."@gmail.com",
                    'password' => Hash::make(Str::random(5)),
                    'dni' => Str::random(8),
                    'admin' => true,
                    'address_id' => $indiceDirecciones
                ]
            );

            
        }
    }
}
