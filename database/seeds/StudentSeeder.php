<?php

use Illuminate\Database\Seeder;
use App\Models\Student;

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
            Student::create([
                "name" => 'student'.$x,
                "phone" => '0123456'.$x,
                "email" => 'student@app.com'.$x,
                "country" => 'country'.$x,
                "city" => 'city'.$x,
                "password" => bcrypt('123123')
            ]);
        }
    }
}
