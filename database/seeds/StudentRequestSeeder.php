<?php

use Illuminate\Database\Seeder;
use App\Models\StudentRequest;
class StudentRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 200 ; $x++) { 
            StudentRequest::create([
                "student_id" => rand(1,70),
                "course_id" => rand(1,90),
                "institute_message" => '<body contenteditable="true" class="cke_editable cke_editable_themed cke_contents_ltr cke_show_borders" spellcheck="false"><p><strong>First name:</strong> Ibrahim</p><p><strong>Family name:</strong> Alshammari</p><p><strong>Nationality:</strong> Saudi Arabia</p><p><strong>Date of birth:</strong> 03/02/1995</p><p><strong>Gender:</strong> Male</p><p><strong>Passport number:</strong> X730039</p><p><br></p><h1><span style="color:#000000">Occupation:</span></h1><p><strong>Mobile number: </strong>0541098287</p><p><strong>Email:</strong> ibra.alkatfa@gmail.com</p><p><strong>House number and street:</strong></p></body>',
                "status" => 'new',
            ]);
        }
    }
}
