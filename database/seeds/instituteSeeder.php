<?php

use Illuminate\Database\Seeder;
use App\institute;
use App\institute_questions;
use Illuminate\Support\Str;
class instituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $min=1;
        $max=20;
         for ($x=0; $x<10; $x++){



        $institute =  institute::create([
            "name_ar"=>Str::random(10),  
            "about_ar"=>Str::random(20),  
            "country_id"=> rand($min,$max),  
            "city_id"=> rand($min,$max),  
          
  
          ]);
  
          $institute_id = $institute->id;
      
       
           
            //    dump( $question['questions']);
               institute_questions::create([
                   'institute_id'=>  $institute_id,
                   'question'=>  Str::random(60),
                   'answer'=>  Str::random(60),
               ]);

               
         }

    }
}
