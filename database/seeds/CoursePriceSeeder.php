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
                "currency_code" => 'USD',
                "currency_amount" => 100,
                "weeks" => 7,
                "price" => 550,
                "course_id" => $x,
            ]);
        }
        for ($x = 1; $x <= 200; $x++) {
            CoursePrice::create([
                "currency_code" => 'GBP',
                "currency_amount" => 200,
                "weeks" => 12,
                "price" => 480,
                "course_id" => $x,
            ]);
        }
        for ($x = 1; $x <= 200; $x++) {
            CoursePrice::create([
                "currency_code" => 'USD',
                "currency_amount" => 500,
                "weeks" => 20,
                "price" => 300,
                "course_id" => $x,
            ]);
        }
        for ($x = 1; $x <= 200; $x++) {
            CoursePrice::create([
                "currency_code" => 'GBP',
                "currency_amount" => 100,
                "weeks" => 29,
                "price" => 280,
                "course_id" => $x,
            ]);
        }
    }
}
