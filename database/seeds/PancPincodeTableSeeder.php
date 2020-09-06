<?php

use Illuminate\Database\Seeder;
use App\Models\Pincode;

class PancPincodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(Pincode::class, 10)->create();
    }
}
