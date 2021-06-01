<?php

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\City;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($x=1; $x <= 70 ; $x++) { 
            $city_id = rand(1,30);
            $country_id = City::where('id' , $city_id)->get('country_id')[0]->country_id;
            Student::create([
                "name" => 'محمود سامي'.$x,
                "phone" => '0123456'.$x,
                "email" => 'student@app.com'.$x,
                "address" => 'عنوان الطالب , دبي , الامارات'.$x,
                "nationality" => 'سعودي '.$x,
                "country" => 'دولة'.$x,
                "city" => 'مدينة'.$x,
                "password" => bcrypt('123123')
            ]);
        }
    }
}
