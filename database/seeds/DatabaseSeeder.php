<?php

use App\Models\Insurances;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(InstituteSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(CoursePriceSeeder::class);
        $this->call(VisaCategorySeeder::class);
        $this->call(VisaSeeder::class);
        $this->call(VisaQuestionSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(StudentSuccessStorySeeder::class);
        $this->call(InsuranceSeeder::class);
        $this->call(AirportsSeeder::class);
        $this->call(ResidencesSeeder::class);
        $this->call(StudentRequestSeeder::class);
        $this->call(InstituteRateSeeder::class);
    }
}
