<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users= [
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'identity' =>'123-54-456', 'number' =>'01542654', 'gender'=> 'male' ,'password' => bcrypt(123456), 'user_type' => 'admin'],
            ['name' => 'employee', 'email' => 'employee@gmail.com', 'identity' =>'123-54-456', 'number' =>'016942654', 'gender'=> 'male' , 'password' => bcrypt(123456), 'user_type' => 'employee']
        ];

        foreach($users as $user){
            $data_user = new User;
            $data_user->name = $user['name'];
            $data_user->email = $user['email'];
            $data_user->identity = $user['identity'];
            $data_user->number = $user['number'];
            $data_user->gender = $user['gender'];
            $data_user->password = $user['password'];
            $data_user->user_type = $user['user_type'];
            $data_user->save();
        };
    }
}
