<?php

use Illuminate\Database\Seeder;
use App\Models\Blog;

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
            Blog::create([
                "title_ar" => 'مقال'.$x,
                "content_ar" => 'خسائر اللازمة ومطالبة حدة بل. الآخر الحلفاء أن غزو, إجلاء وتنامت عدد مع. لقهر معركة لبلجيكا، بـ انه, ربع الأثنان المقيتة في, اقتصّت المحور حدة و. هذه ما طرفاً عالمية استسلام, الصين وتنامت حين 30, ونتج والحزب المذابح كل جوي. أسر كارثة المشتّتون بل, وبعض وبداية الصفحة غزو قد, أي بحث تعداد الجنوب.قصف المسرح واستمر الاتحاد في, ذات أسيا للغزو، الخطّة و, الآخر لألمانيا جهة بل. في سحقت هيروشيما البريطاني يتم, غريمه باحتلال الأيديولوجية، في فصل, دحر وقرى لهيمنة الإيطالية 30. استبدال استسلام القاذفات عل مما. ببعض مئات وبلجيكا، قد أما, قِبل الدنمارك حتى كل, العمليات اليابانية انه أن.حتى هاربر موسكو ثم, وتقهقر المنتصرة حدة عل, التي فهرست واشتدّت أن أسر. كانت المتاخمة التغييرات أم وفي. ان وانتهاءً باستحداث قهر. ان ضمنها للأراضي الأوروبية ذات.', 
                "banner" => 'storage/default_images.png',
                "creator_id" => 1,
                "country_id" => rand(1 , 10),
                "city_id" => rand(1 , 30),
                "institute_id" => rand(1 , 30),
                "category_id" => rand(1 , 10),
                "approvement" => 1,
            ]);
        }
    }
}
