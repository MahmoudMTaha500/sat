<?php

use Illuminate\Database\Seeder;
use App\Models\Airports;
class AirportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 30; $x++) {
            Airports::create([
                "name_ar" => 'airports'.$x,
                "institute_id" => rand(1,30),
                "price" => rand(10,3000),
               
            ]);
        }
    }
}
