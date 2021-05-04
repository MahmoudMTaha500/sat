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
<<<<<<< HEAD
                "name_ar" => 'اللغات في الخارج'.$x,
=======
                "name_ar" => 'تصنيف'.$x,
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
                "creator_id" => 1,
            ]);
        }
    }
}
