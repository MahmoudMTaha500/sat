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
                "name_ar" => 'Visa Category'.$x,
                "creator_id" => 1,
            ]);
        }
    }
}

