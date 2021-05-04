<?php

use Illuminate\Database\Seeder;
use App\Models\StudentSuccessStory;

class StudentSuccessStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 70 ; $x++) { 
            StudentSuccessStory::create([
                "story" => 'هناك العديد من قصص النجاح والأمثلة لأشخاص فشلوا في بداية حيواتهم وحققوا بعد ذلك نجاح لم يتوقعه أحد، ويوجد الكثير من هؤلاء الأشخاص استطاعوا تغيير العالم الى الأفضل ومنح الأمل للكثير من الناس حول قصصهم التي سوف تمدك بحماس شديد، ونقصد بالفشل هنا العائق الذي منعهم من مواصلة مشوارهم في الحياة أيًا كان هذا العائق، فقد أثبت هؤلاء الأشخاص قدرة الإنسان على تخطي الصعاب مهما كانت العوائق، وفي هذا المقال نقدم لكم 5 قصص تحفيزية لأشخاص استطاعوا التغّلب على عوائقهم بصورة مدهشة.',
                "student_id" => $x,
                "approvement" => 1,
            ]);
        }
    }
}
