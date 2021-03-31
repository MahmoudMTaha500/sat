<?php

use Illuminate\Database\Seeder;
use App\Models\InstituteRate;
use App\Models\StudentRequest;

class InstituteRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 70 ; $x++) {
            $request = StudentRequest::where('student_id' ,$x)->get();
            if(!empty($request[0])){
                InstituteRate::create([
                    "rate" => rand(1,5) ,
                    "review" => $x.'شكراً لكل العاملين فى كابلان على حسن الاستضافه وحسن التعامل ونخص بالشكر فريق الإستقبال تحت إشراف الأستاذ عبد الفتاح أيضاً العاملين بالتدريس تحت اشراف الأستاذ شريف ونشكر أيضاً العاملين بالمطعم والمسئولين عن البوفيه اليومى المتميز دائم' ,
                    "student_id" => $x,
                    "institute_id" => $request[0]->course->institute->id,
                ]);
            }
            
        }
    }
}
