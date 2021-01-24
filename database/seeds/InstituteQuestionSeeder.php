<?php

use Illuminate\Database\Seeder;
use App\Models\InstituteQuestion;

class InstituteQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 60; $x++) {
            InstituteQuestion::create([
                "institute_id" => rand(1,30),
                "question" => 'quetion'.$x,
                "answer" => 'answer'.$x,
            ]);
        }
    }
}
