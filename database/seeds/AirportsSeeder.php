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
                "name_ar" => '1الاستقبال من مطار جدة'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            Airports::create([
                "name_ar" => '2الاستقبال من مطار جدة'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            Airports::create([
                "name_ar" => '3الاستقبال من مطار جدة'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            Airports::create([
                "name_ar" => '4الاستقبال من مطار جدة'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            Airports::create([
                "name_ar" => '5الاستقبال من مطار جدة'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
    }
}
