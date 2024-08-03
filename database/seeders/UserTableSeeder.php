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
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt(123456)],
            ['name' => 'employee', 'email' => 'employee@gmail.com', 'password' => bcrypt(123456)]
        ];

        foreach($users as $user){
            $data_user = new User;
            $data_user->name = $user['name'];
            $data_user->email = $user['email'];
            $data_user->password = $user['password'];
            $data_user->save();
        };
    }
}
