<?php

use Illuminate\Database\Seeder;
use App\Models\StudentRequest;
use App\Models\Course;
use App\Models\residences;
use App\Models\Airports;
use App\Models\Institute;
class StudentRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($x=1; $x <= 70 ; $x++) {
            $weeks = rand(1,15);
            $course = Course::where('id' , $x)->get()[0];
            $residence = residences::where('institute_id' , $course->institute->id)->inRandomOrder()->get()[0];
            $airport = Airports::where('institute_id' , $course->institute->id)->inRandomOrder()->get()[0];
            $insurance = price_per_week(Institute::where('id' , $course->institute->id)->get()[0]->insurancePrice , $weeks);
            $price_per_week = price_per_week($course->coursesPrice , $weeks);
            $total_price = ($price_per_week*(1-$course->discount) + $insurance +$residence->price)*$weeks + $airport->price;
            StudentRequest::create([
                "student_id" => $x,
                "course_id" => $x,
                "institute_message" => $course->institute->institute_questions,
                "status" => 'جديد',
                "weeks" => $weeks,
                "price_per_week" => $price_per_week*(1-$course->discount),
                "residence_id" => $residence->id ,
                "residence_price" => $residence->price,
                "airport_id" => $airport->id,
                "airport_price" => $airport->price,
                "insurance_price" => $insurance,
                "total_price" => $total_price,
                "paid_price" => $total_price,
                "remaining_price" => 0,
                "started_date" => '2021-03-29',
                "note" => 'هذه ملاحظة افتراضية',
            ]);
        }
    }
}
