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
                "price" => (240*5.21 + 0.21*240),
                "currency_code" => 'GBP',
                "currency_amount" => 240,
            ]);
        }

        for ($x = 1; $x <= 30; $x++) {
            $weeks = 12;
            Insurances::create([
                "weeks" => $weeks,
                "institute_id" => $x,
                "price" => (200*5.21 + 0.21*200),
                "currency_code" => 'GBP',
                "currency_amount" => 200,
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            $weeks = 18;
            Insurances::create([
                "weeks" => $weeks,
                "institute_id" => $x,
                "price" => (180*5.21 + 0.21*180),
                "currency_code" => 'GBP',
                "currency_amount" => 180,
            ]);
        }

        for ($x = 1; $x <= 30; $x++) {
            $weeks = 23;
            Insurances::create([
                "weeks" => $weeks,
                "institute_id" => $x,
                "price" => (170*5.21 + 0.21*170),
                "currency_code" => 'GBP',
                "currency_amount" => 170,
            ]);
        }

        for ($x = 1; $x <= 30; $x++) {
            $weeks = 26;
            Insurances::create([
                "weeks" => $weeks,
                "institute_id" => $x,
                "price" => (150*5.21 + 0.21*150),
                "currency_code" => 'GBP',
                "currency_amount" => 150,
            ]);
        }
    }
}
