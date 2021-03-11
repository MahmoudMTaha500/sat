<?php

use Illuminate\Database\Seeder;
use App\Models\Insurances;

class InsuranceSeeder extends Seeder
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
                "institute_id" => $x,
                "price" => rand(1,9)*100,
            ]);
        }
    }
}
