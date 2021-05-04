<?php

use Illuminate\Database\Seeder;
use App\Models\VisaCategory;

class VisaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 5; $x++) {
            VisaCategory::create([
<<<<<<< HEAD
                "name_ar" => 'سياحية 6 شهور'.$x,
=======
                "name_ar" => 'تصنيف التاشيرة'.$x,
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
                "creator_id" => 1,
            ]);
        }
    }
}

