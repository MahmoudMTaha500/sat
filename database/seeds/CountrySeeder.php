<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 10; $x++) {
            Country::create([
<<<<<<< HEAD
                "name_ar" => 'بريطانيا'.$x
=======
                "name_ar" => 'دولة'.$x
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
            ]);
        }
    }
}
