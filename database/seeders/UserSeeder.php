<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'admin',
               'email'=>'admin@gmail.com',
               'role_id'=>1,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'user',
               'email'=>'user@gmail.com',
               'role_id'=> 2,
               'password'=> bcrypt('12345678'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
