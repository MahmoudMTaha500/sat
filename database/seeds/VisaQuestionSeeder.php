<?php

use Illuminate\Database\Seeder;
use App\Models\VisaQuestion;
use App\Models\VisaQuestionChoices;

class VisaQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 20; $x++) {
            $rand_field_type = rand(1,7);
            $field_type = '';
            if($rand_field_type == 1){$field_type = 'name';}
            if($rand_field_type == 2){$field_type = 'phone';}
            if($rand_field_type == 3){$field_type = 'email';}
            if($rand_field_type == 4){$field_type = 'string';}
            if($rand_field_type == 5){$field_type = 'text';}
            if($rand_field_type == 6){$field_type = 'select';}
            if($rand_field_type == 7){$field_type = 'file';}
            VisaQuestion::create([
                "visa_id" => rand(1,5),
                "question_ar" => 'visa question for student'.$x,
                "field_type" => $field_type,
                "priority" => rand(1,15),
            ]);
            
            if($rand_field_type == 6){
                for ($y = 1; $y <= 5; $y++) {
                    VisaQuestionChoices::create([
                        "choice_ar" => 'choice'.$y,
                        "question_id" => $x,
                    ]);
                }
            }
            
        }
    }
}
