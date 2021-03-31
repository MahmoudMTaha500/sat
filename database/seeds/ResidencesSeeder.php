<?php

use Illuminate\Database\Seeder;
use App\Models\residences;
class ResidencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 30; $x++) {
            residences::create([
                "name_ar" => '1سكن'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            residences::create([
                "name_ar" => '2سكن'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            residences::create([
                "name_ar" => '3سكن'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            residences::create([
                "name_ar" => '4سكن'.$x,
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
    }
}
