<?php

use Illuminate\Database\Seeder;
use App\Models\Favourite;

class FavouriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 70 ; $x++) {
            $random_favourites_number = rand(3 , 10);
            for ($i=1; $i <= $random_favourites_number ; $i++) {
                Favourite::create([
                    "student_id" => $x,
                    "course_id" => rand(1,90),
                ]);
            }
        }
    }
}
