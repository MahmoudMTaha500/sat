<?php

use Illuminate\Database\Seeder;
use App\Models\CoursePrice;
class CoursePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 200; $x++) {
            CoursePrice::create([
                "weeks" => rand(1,10),
                "price" => 2000,
                "course_id" => rand(1 , 90),
                "approvement" => 1,
            ]);
        }
    }
}
