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
        $super_admin = User::create([
            "name" => 'مدير عام',
            "email" => 'super_admin@app.com',
            "password" => bcrypt('123123'),
        ]);
        $super_admin->attachRole('super-admin');
        

        $admin = User::create([
            "name" => 'مدير',
            "email" => 'admin@app.com',
            "password" => bcrypt('123123'),
        ]);
        $admin->attachRole('admin');

        for ($x=1; $x <= 3 ; $x++) { 
            $employee = User::create([
                "name" => 'موظف'.$x,
                "email" => 'employee@app.com'.$x,
                "password" => bcrypt('123123'),
            ]);
            $employee->attachRole('employee');
            $employee->attachPermissions(['institutes-create','institutes-read','institutes-update']);
        }
        for ($x=4; $x <= 6 ; $x++) { 
            $employee = User::create([
                "name" => 'موظف'.$x,
                "email" => 'employee@app.com'.$x,
                "password" => bcrypt('123123'),
            ]);
            $employee->attachRole('employee');
            $employee->attachPermissions(['courses-create','courses-read','courses-update' , 'courses-delete']);
        }
        for ($x=7; $x <= 9 ; $x++) { 
            $employee = User::create([
                "name" => 'موظف'.$x,
                "email" => 'employee@app.com'.$x,
                "password" => bcrypt('123123'),
            ]);
            $employee->attachRole('employee');
            $employee->attachPermission('articals-create');
        }
    }
}
