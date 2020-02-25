<?php

use Illuminate\Database\Seeder;
use App\User;

class insert extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::insert([
                'first_name'=>'Ian ',
                'second_name'=>'Madara',
                'gender'=>'Male',
                'phone'=>'0713676655',
                'location'=>'Rongai',
                'username'=>'admin',
                'email'=>'admin1@gmail.com',
                'role_id'=>2,
                'active'=>1,
                'consultant_id'=>1,
                'password'=>bcrypt('admin'),
                'remember_token'=> str_random(10),

            ]
        );
    }
}
