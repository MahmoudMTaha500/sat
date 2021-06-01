<?php

use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 10; $x++) {
            BlogCategory::create([
                "name_ar" => 'اللغات في الخارج'.$x,
                "creator_id" => 1,
            ]);
        }
    }
}
