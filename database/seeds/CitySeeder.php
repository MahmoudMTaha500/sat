<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 30; $x++) {
            City::create([
<<<<<<< HEAD
                "name_ar" => 'مانشيستر'.$x,
=======
                "name_ar" => 'مدينة'.$x,
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
                "country_id" => rand(1,10)
            ]);
        }
    }
}
