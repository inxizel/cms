<?php

use Illuminate\Database\Seeder;
use Zent\User\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'email'     =>  'admin@gmail.com',
            'password'  =>  bcrypt(123456),
            'status'    =>  1,
            'type'      =>  1
        ]);
    }
}
