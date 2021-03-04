<?php

use Illuminate\Database\Seeder;
use App\Models\Insurances;
class InsurancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 30; $x++) {
            Insurances::create([
                "name_ar" => 'Institute'.$x,
                "institute_id" => rand(1,30),
                "price" => rand(10,3000),
               
            ]);
        }
    }
}
