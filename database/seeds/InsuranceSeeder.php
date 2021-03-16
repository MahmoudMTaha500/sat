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
            $weeks = rand(1,30);
            Insurances::create([
                "weeks" => $weeks,
                "institute_id" => $x,
                "price" => $weeks*100,
            ]);
        }
    }
}
