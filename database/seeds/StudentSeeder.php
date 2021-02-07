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
        for ($x=1; $x <= 30 ; $x++) { 
            Student::create([
                "name" => 'student'.$x,
                "email" => 'student@app.com'.$x,
                "password" => bcrypt('123123')
            ]);
        }
    }
}
