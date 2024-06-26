<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Si Admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt(12345)
            ],
            [
                'name'=>'Si Pengelola',
                'email'=>'pengelola@gmail.com',
                'role'=>'pengelola',
                'password'=>bcrypt(12345)
            ]
        ];
    foreach ($userData as $key => $val){
        User::create($val);
    }
    }
}
