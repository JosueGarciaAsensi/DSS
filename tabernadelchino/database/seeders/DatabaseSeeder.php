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
        $this->command->info('Addresses table seeded!' );

        $this->call( UsersTableSeeder ::class );
        $this->command->info('Users table seeded!' );

        $this->call( BeerTypesTableSeeder ::class );
        $this->command->info('BeerTypes table seeded!' );

        $this->call( ProductsTableSeeder ::class );
        $this->command->info('Products table seeded!' );

        $this->call( CartTableSeeder ::class );
        $this->command->info('Carts table seeded!' );

        $this->call( OrderTableSeeder ::class );
        $this->command->info('Orders table seeded!' );

        $this->call( BillTableSeeder ::class );
        $this->command->info('Bills table seeded!' );
    }
}
