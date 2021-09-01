<?php

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\City;
use App\Models\Institute;
use App\Models\Course;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 120; $x++) {
            $city_id = rand(1,30);
            $country_id = City::where('id' , $city_id)->get('country_id')[0]->country_id;
            $institute_id = Institute::where('country_id' , $country_id)->get('id');
            if(empty($institute_id[0])){
                $institute_id = 1;
            }else{
                $institute_id = Institute::where('country_id' , $country_id)->get('id')[0]->id;
            }
            
            $course_id = Course::where('institute_id' , $institute_id)->inRandomOrder()->get('id');
            if(empty($course_id[0])){
                $course_id = 1;
            }else{
                $course_id = Course::where('institute_id' , $institute_id)->inRandomOrder()->get('id')[0]->id;
            }

            Blog::create([
                "title_ar" => 'تعرف علي المعيشة في بريطانيا'.$x,
                "slug" => 'تعرف-علي-المعيشة-في بريطانيا-'.$x,
                "content_ar" => '<p dir="rtl">بالعلم يمكنك تحقيق الأحلام التي تسعى إليها الفرد، وذلك حتى يمكنه أن يصبح عضو ناجح ويفيد وطنه، وعليه فيجب على الفرد الالتزام ببعض الخطوات حتى يمكنه التعلم على النحو الصحيح، والتي تبدأ بالاس<strong>تماع والإنصات جيدًا ثم الحفظ ثم التطبيق.</strong></p><p dir="rtl">بالعلم يمكنك تحقيق الأحلام التي تسعى إليها الفرد، وذلك حتى يمكنه أن يصبح عضو ناجح ويفيد وطنه، وعليه فيجب على الفرد الالتزام ببعض الخطوات حتى يمكنه التعلم على النحو الصحيح، والتي تبدأ بالاستماع والإنصات جيدًا ثم الحفظ ثم التطبيق.</p><h2 dir="rtl">بالعلم يمكنك تحقيق الأحلام التي تسعى إليها الفرد، وذلك حتى يمكنه أن يصبح عضو ناجح ويفيد وطنه، وعليه فيجب على الفرد الالتزام ببعض الخطوات حتى يمكنه التعلم على النحو الصحيح، والتي تبدأ بالاستماع والإنصات جيدًا ثم الحفظ ثم التطبيق.</h2>', 
                "banner" => 'null',
                "creator_id" => 1,
                "country_id" => $country_id,
                "city_id" => $city_id,
                "institute_id" => $institute_id,
                "course_id" => $course_id,
                "category_id" => rand(1 , 10),
                "approvement" => 1,
                "img_alt" => "صورة معهد بريطانيا",
                "title_tag" => 'تعرف علي المعيشة في بريطانيا'.$x,
                "meta_keywords" => "بريطانيا, التعلم عن بعد, الدراسة في الخارج",
                "meta_description" => "تعرف علي المعيشة في بريطانيا ك افضل عيشة في جميع دول العالم",
            ]);
        }
    }
}
