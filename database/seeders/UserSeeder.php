<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name'=> "user1",
            'email'=> "user1@test.com",
            'address'=> "user testing address",
            'contact'=> "12345678901",
            'birthdate'=> "2021-05-03",
            'password'=>Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'name'=> "user2",
            'email'=> "user2@test.com",
            'address'=> "user testing address",
            'contact'=> "12345678902",
            'birthdate'=> "2021-05-03",
            'password'=>Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'name'=> "user3",
            'email'=> "user3@test.com",
            'address'=> "user testing address",
            'contact'=> "12345678903",
            'birthdate'=> "2021-05-03",
            'password'=>Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'name'=> "user4",
            'email'=> "user4@test.com",
            'address'=> "user testing address",
            'contact'=> "12345678904",
            'birthdate'=> "2021-05-03",
            'password'=>Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'name'=> "user5",
            'email'=> "user5@test.com",
            'address'=> "user testing address",
            'contact'=> "12345678905",
            'birthdate'=> "2021-05-03",
            'password'=>Hash::make('12345678')
        ]);
    }
}
