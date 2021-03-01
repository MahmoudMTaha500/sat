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
        $course_id = 1;
        for ($x = 1; $x <= 200; $x++) {
            CoursePrice::create([
                "weeks" => rand(1,10),
                "price" => 2000,
                "course_id" => $course_id,
            ]);
            if($course_id !=90){$course_id++;}else{$course_id=1;}
        }
    }
}
