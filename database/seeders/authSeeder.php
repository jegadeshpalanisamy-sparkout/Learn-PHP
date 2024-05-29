<?php

namespace Database\Seeders;

use App\Models\AuthUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class authSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AuthUser::create(
            [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'password'=>'user12345',
                'role'=>'user'
            ]
            );

    }
}
