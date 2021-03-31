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
                "name_ar" => '1مطار'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            Airports::create([
                "name_ar" => '2مطار'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            Airports::create([
                "name_ar" => '3مطار'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            Airports::create([
                "name_ar" => '4مطار'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            Airports::create([
                "name_ar" => '5مطار'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
    }
}
