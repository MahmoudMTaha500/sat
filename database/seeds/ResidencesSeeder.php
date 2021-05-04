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
<<<<<<< HEAD
                "name_ar" => '1السكن مع عائلة '.$x,
=======
                "name_ar" => '1سكن'.$x,
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            residences::create([
<<<<<<< HEAD
                "name_ar" => '2السكن مع عائلة '.$x,
=======
                "name_ar" => '2سكن'.$x,
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            residences::create([
<<<<<<< HEAD
                "name_ar" => '3السكن مع عائلة '.$x,
=======
                "name_ar" => '3سكن'.$x,
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            residences::create([
<<<<<<< HEAD
                "name_ar" => '4السكن مع عائلة '.$x,
=======
                "name_ar" => '4سكن'.$x,
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
                "institute_id" => $x,
                "price" => rand(1,9)*100,
               
            ]);
        }
    }
}
