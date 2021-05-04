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
                "name_ar" => 'لغة انجليزية عام '.$x,
                "slug" => 'لغة-انجليزية-عام-'.$x,
                "about_ar" => 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...وعند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي. وخلافاَ للاعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد. من كتاب "حول أقاصي الخير والشر"', 
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
