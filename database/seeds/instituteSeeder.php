<?php

use Illuminate\Database\Seeder;
use App\Models\Institute;
use App\Models\City;
class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 30; $x++) {
            $city_id = rand(1,30);
            $country_id = City::where('id' , $city_id)->get('country_id')[0]->country_id;
            Institute::create([
                "name_ar" => 'معهد'.$x,
                "slug" => 'Institute'.$x,
                "about_ar" => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',

                "content_ar" => ' exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                "country_id" => $country_id,
                "city_id" => $city_id,
                "logo" => 'storage/default_images.png',
                "banner" => 'storage/default_images.png',
                "creator_id" => 1,
                "sat_rate" => 5,
                "rate_switch" => rand(0 , 1),
                "approvement" => rand(0 , 1),
            ]);
        }
    }
}
