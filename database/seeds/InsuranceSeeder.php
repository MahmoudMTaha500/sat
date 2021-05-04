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
            $weeks = 7;
            Insurances::create([
                "weeks" => $weeks,
                "institute_id" => $x,
                "price" => 240,
            ]);
        }

        for ($x = 1; $x <= 30; $x++) {
            $weeks = 12;
            Insurances::create([
                "weeks" => $weeks,
                "institute_id" => $x,
                "price" => 200,
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            $weeks = 18;
            Insurances::create([
                "weeks" => $weeks,
                "institute_id" => $x,
                "price" => 180,
            ]);
        }

        for ($x = 1; $x <= 30; $x++) {
            $weeks = 23;
            Insurances::create([
                "weeks" => $weeks,
                "institute_id" => $x,
                "price" => 170,
            ]);
        }

        for ($x = 1; $x <= 30; $x++) {
            $weeks = 26;
            Insurances::create([
                "weeks" => $weeks,
                "institute_id" => $x,
                "price" => 150,
            ]);
        }
    }
}
