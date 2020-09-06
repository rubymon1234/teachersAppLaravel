<?php

use Illuminate\Database\Seeder;
use App\Models\Panchayath;

class PanchayathTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(Panchayath::class, 10)->create();
    }
}
