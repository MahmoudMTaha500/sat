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
            $currency_amount = rand(1,9)*100;
            residences::create([
                "name_ar" => '1السكن مع عائلة '.$x,
                "institute_id" => $x,
                "price" => ($currency_amount*5.21 + 0.21*$currency_amount),
                "currency_code" => 'GBP',
                "currency_amount" => $currency_amount,
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            $currency_amount = rand(1,9)*100;
            residences::create([
                "name_ar" => '2السكن مع عائلة '.$x,
                "institute_id" => $x,
                "price" => ($currency_amount*5.21 + 0.21*$currency_amount),
                "currency_code" => 'GBP',
                "currency_amount" => $currency_amount,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            $currency_amount = rand(1,9)*100;
            residences::create([
                "name_ar" => '3السكن مع عائلة '.$x,
                "institute_id" => $x,
                "price" => ($currency_amount*5.21 + 0.21*$currency_amount),
                "currency_code" => 'GBP',
                "currency_amount" => $currency_amount,
               
            ]);
        }
        for ($x = 1; $x <= 30; $x++) {
            $currency_amount = rand(1,9)*100;
            residences::create([
                "name_ar" => '4السكن مع عائلة '.$x,
                "institute_id" => $x,
                "price" => ($currency_amount*5.21 + 0.21*$currency_amount),
                "currency_code" => 'GBP',
                "currency_amount" => $currency_amount,
            ]);
        }
    }
}
