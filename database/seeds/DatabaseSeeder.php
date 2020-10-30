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
        // $this->call(UserSeeder::class);
        $this->call(CategoryTableSeeder::class);
        // $this->call(UserTableSeeder::class);

        $this->call(OrderTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductOrderSeeder::class);

    }
}
