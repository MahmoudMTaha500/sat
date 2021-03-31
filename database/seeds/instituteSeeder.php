<?php

use Illuminate\Database\Seeder;
use App\Models\Institute;
use App\Models\City;
class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 30; $x++) {
            $city_id = rand(1,30);
            $country_id = City::where('id' , $city_id)->get('country_id')[0]->country_id;
            Institute::create([
                "name_ar" => 'معهد'.$x,
                "slug" => 'Institute'.$x,
                "map" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55201.93736667117!2d31.59479233555395!3d30.147953973680764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1457f7d7c85c1e63%3A0xa16c80a505d27145!2sEl%20Shorouk%20City%2C%20Al%20Shorouk%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1616586554868!5m2!1sen!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                "about_ar" => 'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج مواقع انترنت ...وعند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي. وخلافاَ للاعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد. من كتاب "حول أقاصي الخير والشر',

                "institute_questions" => ' exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                "country_id" => $country_id,
                "city_id" => $city_id,
                "logo" => 'storage/default_images.png',
                "banner" => 'storage/default_images.png',
                "creator_id" => 1,
                "sat_rate" => 5,
                "rate_switch" => rand(0 , 1),
                "approvement" => rand(0 , 1),
            ]);
        }
    }
}
