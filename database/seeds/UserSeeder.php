<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => 'super admin',
            "email" => 'super_admin@app.com',
            "password" => bcrypt('123123')
        ]);
    }
}
