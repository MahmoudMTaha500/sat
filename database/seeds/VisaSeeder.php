<?php

use Illuminate\Database\Seeder;
use App\Models\Visa;


class VisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 5; $x++) {
            Visa::create([
                "category_id" => $x,
                "country_id" => $x,
                "creator_id" => 1,
                "price" => rand(1 , 9)*1000,
                "approvement" => 1,
                "active" => 1,
            ]);
        }
    }
}
