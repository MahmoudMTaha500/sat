<?php

use Illuminate\Database\Seeder;
use App\Models\Institute;
class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x < 30; $x++) {
            Institute::create([
                "name_ar" => Str::random(10),
                "about_ar" => Str::random(20),
                "country_id" => rand(1,10),
                "city_id" => rand(1,30),
                "logo" => 'storage/default_images.png',
                "banner" => 'storage/default_images.png',
                "creator_id" => 1,
                "sat_rate" => 5,
                "rate_switch" => 1,
                "active" => 1,
                "approvment" => 1,
            ]);
        }
    }
}
