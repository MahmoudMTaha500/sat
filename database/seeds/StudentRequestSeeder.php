<?php

use Illuminate\Database\Seeder;
use App\Models\StudentRequest;
use App\Models\Course;
use App\Models\residences;
use App\Models\Airports;
use App\Models\Insurances;
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
            $insurance = Insurances::where('institute_id' , $course->institute->id)->inRandomOrder()->get()[0];
            $price_per_week = price_per_week($course->coursesPrice , $weeks);
            $total_price = $price_per_week*$weeks + $insurance->price + $airport->price + $residence->price;
            StudentRequest::create([
                "student_id" => $x,
                "course_id" => $x,
                "institute_message" => $course->institute->institute_questions,
                "status" => 'new',
                "weeks" => $weeks,
                "price_per_week" => $price_per_week,
                "residence_id" => $residence->id ,
                "residence_price" => $residence->price,
                "airport_id" => $airport->id,
                "airport_price" => $airport->price,
                "insurance_id" => $insurance->id,
                "insurance_price" => $insurance->price,
                "total_price" => $total_price,
                "paid_price" => $total_price,
                "remaining_price" => 0,
                "note" => 'هذه ملاحظة افتراضية',
            ]);
        }
    }
}
