<?php

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
        $this->call(SuppliersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CartTableSeeder::class);
    }
}
