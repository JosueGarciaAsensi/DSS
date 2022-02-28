<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call( AddressTableSeeder ::class );
        $this->command->info('Address table seeded!' );

        $this->call( UsersTableSeeder ::class );
        $this->command->info('User table seeded!' );

        $this->call( BeerTypeTableSeeder ::class );
        $this->command->info('BeerType table seeded!' );

        $this->call( ProductTableSeeder ::class );
        $this->command->info('Product table seeded!' );

        $this->call( CartTableSeeder ::class );
        $this->command->info('Cart table seeded!' );

        $this->call( OrderTableSeeder ::class );
        $this->command->info('Order table seeded!' );

        $this->call( BillTableSeeder ::class );
        $this->command->info('Bill table seeded!' );
    }
}
