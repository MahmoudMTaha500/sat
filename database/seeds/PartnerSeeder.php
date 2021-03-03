<?php

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 20 ; $x++) { 
            Partner::create([
                "name" => 'شريك '.$x,
            ]);
        }
    }
}
