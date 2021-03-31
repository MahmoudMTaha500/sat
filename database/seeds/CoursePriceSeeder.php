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
        for ($x = 1; $x <= 90; $x++) {
            CoursePrice::create([
                "weeks" => 7,
                "price" => 550,
                "course_id" => $x,
            ]);
        }
        for ($x = 1; $x <= 90; $x++) {
            CoursePrice::create([
                "weeks" => 12,
                "price" => 480,
                "course_id" => $x,
            ]);
        }
        for ($x = 1; $x <= 90; $x++) {
            CoursePrice::create([
                "weeks" => 20,
                "price" => 300,
                "course_id" => $x,
            ]);
        }
        for ($x = 1; $x <= 90; $x++) {
            CoursePrice::create([
                "weeks" => 29,
                "price" => 280,
                "course_id" => $x,
            ]);
        }
    }
}
