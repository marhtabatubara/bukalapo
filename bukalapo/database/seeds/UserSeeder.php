<?php

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
    DB::table('users')->insert([
        
        'name'=>'admin',
        'email'=>'admin@gmail.com',
        'email_verified_at'=>'2022-01-01 00:00:00',
        'password'=>bcrypt('admin123'),
        'level'=>'admin',

    ]);

    DB::table('users')->insert([
        
        'name'=>'author',
        'email'=>'author@gmail.com',
        'email_verified_at'=>'2022-02-01 00:00:00',
        'password'=>bcrypt('author123'),
        'level'=>'author',

    ]);
    }
}