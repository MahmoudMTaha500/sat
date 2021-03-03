<?php

use Illuminate\Database\Seeder;
use App\Models\Course;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 90; $x++) {
            $int= mt_rand(1262055681,1262055681);
            Course::create([
                "name_ar" => 'دورة '.$x,
                "slug" => 'دورة-'.$x,
                "about_ar" => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id quos officia quibusdam fugit vel! Perspiciatis, asperiores obcaecati. Ut quis eligendi expedita accusamus similique eos aliquid esse officia nihil aspernatur? Perspiciatis.', 
                "institute_id" => rand(1,30),
                "creator_id" => 1,
                "min_age" => rand(12 , 27),
                "start_day" => date("Y-m-d H:i:s",$int),
                "study_period" => 'morning',
                "lessons_per_week" => 5,
                "hours_per_week" => 20,
                "required_level" => 'مبتدئ',
                "discount" => rand(0,95)/100,
            ]);
        }
    }
}
