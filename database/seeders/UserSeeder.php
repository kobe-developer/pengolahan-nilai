<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $userList = [
            [
                'username' => $faker->userName,
                'nickname' => $faker->name('female'),
                'email' => $faker->email,
                'password' => Hash::make('1234'),
                'role' => UserRole::ADMINSTRATOR
            ],
            [
                'username' => $faker->userName,
                'nickname' => $faker->name('female'),
                'email' => $faker->email,
                'password' => Hash::make('1234'),
                'role' => UserRole::DOSEN,
            ],
            [
                'username' => $faker->userName,
                'nickname' => $faker->name('male'),
                'email' => $faker->email,
                'password' => Hash::make('1234'),
                'role' => UserRole::DOSEN
            ]
        ];
        foreach ($userList as $user) User::create($user);
    }
}
