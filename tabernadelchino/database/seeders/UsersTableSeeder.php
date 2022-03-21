<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Address;
use App\Models\Cart;

class UsersTableSeeder extends Seeder {
    protected function getAddress($i) {
        $direcciones = Address::all();
        return $direcciones[$i];
    }

    protected function getCart() {
        $carts = Cart::all();
        return $carts[random_int(0, count($carts)-1)];
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
        $dni = ['55391233J', '51253198K', '23421897W', '384230271P', '891238421H'];

        foreach (range(0,4) as $i) {
            $user = new User();
            $user->name = $names[$i];
            $user->surname = $surnames[$i];
            $user->email = $emails[$i];
            $user->password = Hash::make(Str::random(5));
            $user->dni = $dni[$i];
            $user->admin = true;

            $user->addresses()->associate($this->getAddress($i));

            $user->carts()->associate($this->getCart());

            $user->save();
        }
    }
}
