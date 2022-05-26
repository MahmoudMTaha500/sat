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
                "institute_id" => $x,
                "price" => (240*5.21 + 0.21*240),
                "currency_code" => 'GBP',
                "currency_amount" => 240,
            ]);
        }
    }
}
