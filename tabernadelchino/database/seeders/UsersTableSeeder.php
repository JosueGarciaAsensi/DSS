<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;

class UsersTableSeeder extends Seeder {
    protected function getAddress($i) {
        $direcciones = Address::all();
        return $direcciones[$i];
    }

    protected function getOrder() {
        $orders = Order::all();
        return $orders[random_int(0, count($orders)-1)];
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
        $dni = ['50503584T', '51253198K', '48759207N', '48763949Q', '74379711B'];

        foreach (range(0,4) as $i) {
            $user = new User();
            $user->name = $names[$i];
            $user->surname = $surnames[$i];
            $user->email = $emails[$i];
            $user->password = Hash::make('123');
            $user->dni = $dni[$i];
            $user->admin = true;
            $user->visible = true;
            $user->addresses()->associate($this->getAddress($i));

            $user->carts()->associate($i+1);

            $user->save();
        }
    }
}
