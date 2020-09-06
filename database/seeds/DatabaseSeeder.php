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
        $this->call(UserTableSeeder::class);
        // $this->call(PanchayathTableSeeder::class);
        $this->call(PancPincodeTableSeeder::class);
        // $this->call(CountryTableSeeder::class);
        // $this->call(StateTableSeeder::class);
        // $this->call(CityTableSeeder::class);
        
    }
}
