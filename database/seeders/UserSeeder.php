<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user =[
        [
        'name'=> 'Administator',
        'email'=> 'admin@gmail.com',
        'password'=> bcrypt('a'),
        'level'=> 1
        ],
        [
            'name'=> 'kasir1',
            'email'=> 'kasir1@gmail.com',
            'password'=> bcrypt('a'),
            'level'=> 2
        ],
        [
            'name'=> 'Kasir2',
            'email'=> 'kasir@gmail.com',
            'password'=> bcrypt('a'),
            'level'=> 2
        ],
    ];

    foreach ($user as $key => $value){
        User::create($value);
    }
    }
}
