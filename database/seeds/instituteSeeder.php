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
                "name_ar" => 'كابلان'.$x,
                "slug" => 'Institute'.$x,
                "map" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55201.93736667117!2d31.59479233555395!3d30.147953973680764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1457f7d7c85c1e63%3A0xa16c80a505d27145!2sEl%20Shorouk%20City%2C%20Al%20Shorouk%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1616586554868!5m2!1sen!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                "about_ar" => '<p dir="rtl">بالعلم يمكنك تحقيق الأحلام التي تسعى إليها الفرد، وذلك حتى يمكنه أن يصبح عضو ناجح ويفيد وطنه، وعليه فيجب على الفرد الالتزام ببعض الخطوات حتى يمكنه التعلم على النحو الصحيح، والتي تبدأ بالاس<strong>تماع والإنصات جيدًا ثم الحفظ ثم التطبيق.</strong></p><p dir="rtl">بالعلم يمكنك تحقيق الأحلام التي تسعى إليها الفرد، وذلك حتى يمكنه أن يصبح عضو ناجح ويفيد وطنه، وعليه فيجب على الفرد الالتزام ببعض الخطوات حتى يمكنه التعلم على النحو الصحيح، والتي تبدأ بالاستماع والإنصات جيدًا ثم الحفظ ثم التطبيق.</p><h5 dir="rtl">بالعلم يمكنك تحقيق الأحلام التي تسعى إليها الفرد، وذلك حتى يمكنه أن يصبح عضو ناجح ويفيد وطنه، وعليه فيجب على الفرد الالتزام ببعض الخطوات حتى يمكنه التعلم على النحو الصحيح، والتي تبدأ بالاستماع والإنصات جيدًا ثم الحفظ ثم التطبيق.</h5>',
                "institute_questions" => '<p dir="rtl">بالعلم يمكنك تحقيق الأحلام التي تسعى إليها الفرد، وذلك حتى يمكنه أن يصبح عضو ناجح ويفيد وطنه، وعليه فيجب على الفرد الالتزام ببعض الخطوات حتى يمكنه التعلم على النحو الصحيح، والتي تبدأ بالاس<strong>تماع والإنصات جيدًا ثم الحفظ ثم التطبيق.</strong></p><p dir="rtl">بالعلم يمكنك تحقيق الأحلام التي تسعى إليها الفرد، وذلك حتى يمكنه أن يصبح عضو ناجح ويفيد وطنه، وعليه فيجب على الفرد الالتزام ببعض الخطوات حتى يمكنه التعلم على النحو الصحيح، والتي تبدأ بالاستماع والإنصات جيدًا ثم الحفظ ثم التطبيق.</p><h5 dir="rtl">بالعلم يمكنك تحقيق الأحلام التي تسعى إليها الفرد، وذلك حتى يمكنه أن يصبح عضو ناجح ويفيد وطنه، وعليه فيجب على الفرد الالتزام ببعض الخطوات حتى يمكنه التعلم على النحو الصحيح، والتي تبدأ بالاستماع والإنصات جيدًا ثم الحفظ ثم التطبيق.</h5>',
                "country_id" => $country_id,
                "city_id" => $city_id,
                "logo" => 'null',
                "banner" => 'null',
                "logo_alt" => 'شعار كابلان'.$x,
                "banner_alt" => 'صورة  كابلان'.$x,
                "title_tag" => 'كابلان'.$x,
                "meta_keywords" => 'كابلان, الدراسة في الخارجو اللغة الانجليزية',
                "meta_description" => 'كابلان, الدراسة في الخارجو اللغة الانجليزية',
                "creator_id" => 1,
                "sat_rate" => rand(1 , 5),
                "rate_switch" => 1,
                "approvement" => 1,
            ]);
        }
    }
}
