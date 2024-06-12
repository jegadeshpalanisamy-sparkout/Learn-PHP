<?php

namespace Database\Seeders;

use App\Models\UserTest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserTest::create([
            'name'=>'john',
            'email'=>'john@gmail.com',
            'password'=>Hash::make('12345')
        ]);

        UserTest::create([
            'name'=>'jack',
            'email'=>'jack@gmail.com',
            'password'=>Hash::make('12345')
        ]);

        UserTest::create([
            'name'=>'david',
            'email'=>'david@gmail.com',
            'password'=>Hash::make('12345')
        ]);
    }
}
