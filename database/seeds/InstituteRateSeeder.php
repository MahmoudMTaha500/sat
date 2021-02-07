<?php

use Illuminate\Database\Seeder;
use App\Models\InstituteRate;

class InstituteRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 70 ; $x++) { 
            InstituteRate::create([
                "rate" => rand(1,5) ,
                "student_id" => $x,
                "institute_id" => rand(1,30),
            ]);
        }
    }
}
